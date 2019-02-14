
""" This program makes a user_table full of fake data so we can check whether
    indexing in SQL makes any difference.   We'll time queries with and
    without the index. """

""" Written by Vanessa, April 2018. """

if __name__ == "__main__":

    """ Code to make fake users table.  """
    with open('users.csv', 'w') as resultFile:

        resultFile.write('ID, Account, Password, email, salary\n')

        for i in range(20000):
            resultFile.write(str(i)+ ',user' + str(i) + ',1234, user' +
                             str(i)+'@gmail.com,1000'+'\n')

    """ Code to make fake songs table. """

    with open('fakesongs.csv', 'w') as resultFile:

        resultFile.write('player_id,player_name,word1,word2,word3,word4,word5,word6,word7,word8,word9,word10,word11,word12,word13,word14,word15\n')

        for i in range(20000):
            resultFile.write(str(i)+ ',Name' + str(i) + ',abc'+str(i)+'xyz   \n')
