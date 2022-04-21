import ratemyprofessor
import pandas as pd
import os
# https://blogs.harvard.edu/rprasad/2014/06/16/reading-excel-with-python-xlrd/
# path "C:\Users\gaspa\OneDrive\Desktop\Stage3\ProfName.xlsx"

# to start reading the file first locate the file location
# C:\Users\gaspa\OneDrive\Desktop\Stage3/ProfName
# 'C:/Users/gaspa/OneDrive/Desktop/Stage3/ProfName'

###.xlsx file type###

# recierve 2d data array to write into excel
def inputexcel(dftogo):
    # check if file exists, if it is, delete
    if os.path.exists('rmpData.xlsx'):
        os.remove('rmpData.xlsx')
        print('rmpData.xlsx is deleted')
    else:
        print('creating file')
    
    # create the excel file 
    writer = pd.ExcelWriter('rmpData.xlsx', engine= 'xlsxwriter')

    # put in dataframe
    inputdf = pd.DataFrame(dftogo, columns = ['Name','Rating','Difficulty','Total Ratings'])
    # write the data frame into excel
    inputdf.to_excel(writer, sheet_name='Sheet1')
    # clsoe the writing progress
    writer.save() 

def scrapey(profName):
    # profname should be a list
    # empty data frame to put in
    dfouter = []

    for namey in profName:
        # start with oklahoma sate university on rate my professor
        professor = ratemyprofessor.get_professor_by_school_and_name(ratemyprofessor.get_school_by_name("Oklahoma State University"), namey)

        dfinner = []
        print('Search: ', namey)
        # search for professor's information and put it into data frame
        if professor is not None:
            if professor.school.name == 'Oklahoma State University':

                # write into the data frame
                # order is : name, rating, difficulty, total ratings
                dfinner.append(namey)
                dfinner.append(str(professor.rating))
                dfinner.append(str(professor.difficulty))
                dfinner.append(str(professor.num_ratings))

                # see in the terminal
                print("%sworks in the %s Department of %s." % (professor.name, professor.department, professor.school.name))
                print("Rating: %s / 5.0" % professor.rating)
                print("Difficulty: %s / 5.0" % professor.difficulty)
                print("Total Ratings: %s" % professor.num_ratings)
                print()
            else:
                print('Information missing on Rate My Professor\n')
                # fill in missing data with N/A
                dfinner.append(namey)
                dfinner.append('N/A')
                dfinner.append('N/A')
                dfinner.append('N/A')

        else:
            # when there are missing information. make sure to fill in N/A for empty columns
            print('404 not found\n')
             # fill in missing data with N/A
            dfinner.append(namey)
            dfinner.append('N/A')
            dfinner.append('N/A')
            dfinner.append('N/A')

        # save to data frame
        dfouter.append(dfinner)

    # pass the data frame to excel to write in
    print('outer df: ',dfouter)
    inputexcel(dfouter)

def main():
    # data frame from naem list excel
    #  directory example: 'C:\\Users\\gaspa\\OneDrive\\Desktop\\Stage3\\ProfName.xlsx'
    df = pd.read_excel('', index_col = 0)
    nameList = df.to_string()

    # removing things that are not needed
    nameList = nameList.split(", ")
    nameList[0] = 'Esra Akbas'

    # pass in the array with name list fully strings
    scrapey(nameList)

main()