"""Buy Train Ticket Calculation"""
import datetime
def main():
    """Main Function"""
    option = input()
    today = datetime.datetime.now().date()
    if option == "today":
        expire = datetime.datetime.now().date()
    elif option == "30d":
        expire = datetime.datetime.now().date()+ datetime.timedelta(days=30)
    print("Today: "+str(today))
    print("Expired Date: "+str(expire))

main()
