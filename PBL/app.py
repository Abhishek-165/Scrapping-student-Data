from bs4 import BeautifulSoup
import csv
import requests
import re

def get_college_urls(url):
    '''
    Get Institute page URL's from Institute list page.
    We can use soup and regular expression to extract relative URL
    and then use string concatenation to return
    list of absolute Institute page URL's.
    '''
    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'lxml')

    rel_url_re = r'^frmInstituteSummary\.aspx\?InstituteCode=\d+$'
    rel_urls = soup.find_all('a', href = re.compile(rel_url_re))

    url_structure = 'http://dtemaharashtra.gov.in/approvedinstitues/DTEPortal/'
    #Extracting href attirbute and convert to absolute URL
    college_urls = list(map(lambda x: url_structure + x.get('href'), rel_urls))

    return  college_urls


def extract_branch(soup):
    '''
    Extract branch and intake from college page.

    College page may contain courses other than BE.
    Table with class AppFormTable contains the course name.
    Table with class DataGrid contains branch details for
    respective course.

    To extract branch details for BE course,
    find index of AppFormTable with course BE
    and match this index with DataGrid table.
    '''
    branches = {}
    app_form = soup.find_all('table', class_='AppFormTable')

    #pop first table containing Institute Information
    app_form.pop(0)

    data_grid = soup.find_all('table', class_='DataGrid')

    for index, table in enumerate(app_form):
        if 'B. E' in table.find('th').text:
            break
    else:
        return None #BE course not found

    be_table = data_grid[index]
    rows = be_table.find_all('tr')

    #pop heading row
    rows.pop(0)
    #pop total count row
    rows.pop()

    for row in rows:
        branch_name = row.find_all('td')[1].text
        intake = row.find_all('td')[-1].text
        branches[branch_name] = intake
    return branches


def college_page_scraper(url):
    '''
    Scrape all Institute data and return dictionary of scraped data
    Returns None if institute doesn't have BE course.
    '''
    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'lxml')

    scraped_data = []
    branches = extract_branch(soup)

    if not branches:
        return None

    # branches dict {'it': '200', 'comps' :'200'}

    name = soup.find(id=re.compile('.*InstituteNameEnglish')).text
    region = soup.find(id=re.compile('.*Region')).text
    region_type = soup.find(id=re.compile('.*RegionType')).text
    address = soup.find(id=re.compile('.*AddressEnglish')).text
    webaddress = soup.find(id=re.compile('.*WebAddress')).text
    boys_hostel = soup.find(id=re.compile('.*BoysTotal')).text
    girls_hostel = soup.find(id=re.compile('.*GirlsTotal')).text
    contact = soup.find(id=re.compile('.*OfficePhoneNo')).text
    status = soup.find(id=re.compile('.*Status1')).text
    autonomy_status = soup.find(id=re.compile('.*Status2')).text
    minority = soup.find(id=re.compile('.*Status3')).text


    for branch in branches.keys():
        scraped_data.append({
            'InstitueName': name,
            'Region': region,
            'RegionType': region_type,
            'Address': address,
            'Website': webaddress,
            'BoysHostel': boys_hostel,
            'GirlsHostel': girls_hostel,
            'Contact': contact,
            'Aided/Unaided': status,
            'Autonomy': autonomy_status,
            'Minority': minority,
            'Branch': branch,
            'Intake': branches[branch]
        })
    return scraped_data

def write_to_csv(scraped_data):
    '''Write scraped data to csv file'''
    with open('college.csv', 'w') as csvfile:
        fieldnames = scraped_data[0].keys()
        dict_writer = csv.DictWriter(csvfile,
                                     fieldnames= fieldnames,
                                     delimiter=';',
                                     dialect='excel')
        dict_writer.writeheader()
        for row in scraped_data:
            dict_writer.writerow(row)


def main():

    url_params = {'Pune': '6', 'Mumbai': '3', 'Amravati': '1'}

    college_list_pages = []
    for name, code in url_params.items():
        college_list_pages.append(f'''http://dtemaharashtra.gov.in/approvedinstitues/DTEPortal/frmInstituteList.aspx?RegionID={code}&RegionName={name}''')

    college_urls = []
    for url in college_list_pages:
        college_urls.extend(get_college_urls(url))

    total_scraped_data = []
    for college_url in college_urls:
        scraped_data = college_page_scraper(college_url)
        if scraped_data:
            total_scraped_data.extend(scraped_data)

    if len(total_scraped_data) > 0:
        write_to_csv(total_scraped_data)
    else:
        print("Sorry No colleges were found")

if __name__ == '__main__':
    main()
