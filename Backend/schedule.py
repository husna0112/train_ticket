"""Select Flight"""
import datetime
def main():
    """Main Function"""
    now = datetime.datetime.now().strftime("%H:%M")
    choice = input()
    way = input()
    station = ['กรุงเทพมหานคร (หัวลำโพง)','อุรุพงษ์','พญาไท','ราชปรารภ','มักกะสัน','อโศก','คลองตัน',
               'สุขุมวิท 71','หัวหมาก','บ้านทับช้าง','ซอยวัดลานบุญ','ลาดกระบัง','พระจอมเกล้า','หัวตะเข้',
               'คลองหลวงแพ่ง','คลองอุดมชลจร','เปรง','คลองแขวงกลั่น','คลองบางพระ','บางเตย','ชุมทางฉะเชิงเทรา',
               'ดอนสีนนท์','บางน้ำเปรี้ยว','ชุมทางคลองสิบเก้า','พานทอง','โยทะกา','บ้านสร้าง','ชลบุรี',
               'บ้านปากพลี','บางพระ','ปราจีนบุรี','เขาพระบาท','ชุมทางศรีราชา','โคกมะกอก','ประจันตคาม',
               'บางละมุง','บ้านดงบัง','บ้านพรมแสง','พัทยา','พัทยาใต้','กบินทร์บุรี','บ้านห้วยขวาง',
               'ญาณสังวราราม','หนองสัง','สวนนงนุช','ชุมทางเขาชีจรรย์','พระปรง','บ้านพลูตาหลวง','บ้านแก้ง',
               'ศาลาลำดวน','สระแก้ว','ท่าเกษม','ห้วยโจด','วัฒนานคร','ห้วยเดื่อ','อรัญประเทศ']
    gotrain_name = ['ORD 275','ORD 283','ORD 285','ORD 281','ORD 367',
                    'ORD 389','ORD 279','ORD 277','ORD 391','ORD 383','ORD 371',
                    'ORD 385','ORD 381']
    backtrain_name = ['ORD 372', 'ORD 384', 'ORD 278', 'ORD 280', 'ORD 388', 'ORD 368',
                      'ORD 282', 'ORD 284', 'ORD 276', 'ORD 390', 'ORD 286', 'ORD 394',
                      'ORD 386']
    #กทม - อรัญ 
    ord_275 = ['05:55','-----','06:10','06:15','06:20','06:26','06:36',
               '-----','06:43','06:48','-----','06:55','07:00','07:03',
               '07:11','07:15','07:19','07:24','07:28','07:31','07:40',
               '-----','08:01','08:09','-----','08:23','08:33','-----',
               '08:50','-----','08:58','-----','-----','09:09','09:16',
               '-----','09:30','09:36','-----','-----','09:48','-----',
               '-----','09:59','-----','-----','10:10','-----','10:18',
               '10:25','10:34','10:45','10:55','11:06','11:25','11:35']

    ord_283 = ['06:55','-----','07:08','07:12','07:16','07:22','07:40',
               '-----','07:49','07:57','-----','08:06','08:10','08:14',
               '08:24','08:29','08:34','08:40','08:46','08:51','08:59',
               '09:16','-----','-----','09:31','09:49','-----','10:00',
               '-----','10:07','10:13','-----','-----','10:25','-----',
               '-----','10:35','10:40','-----','10:51','10:57','-----',
               '11:04','11:13','-----','11:20']

    ord_285 = ['06:55','-----','07:08','07:12','07:16','07:22','07:40',
               '-----','07:49','07:57','-----','08:06','08:10','08:14',
               '08:24','08:29','08:34','08:40','08:46','08:51','08:56']

    ord_281 = ['08:00','-----','08:11','-----','08:16','08:20','08:26',
               '-----','08:35','08:44','-----','08:51','08:55','08:57',
               '09:06','09:10','09:14','-----','09:23','-----','09:32',
               '-----','09:53','10:00','-----','10:11','10:21','-----',
               '10:36','-----','10:46','-----','-----','10:58','11:06',
               '11:17','11:23','-----','-----','11:35']

    ord_367 = ['10:10','10:20','10:23','-----','10:30','10:34','10:40',
               '10:43','10:49','10:56','-----','11:02','11:07','11:09',
               '11:18','-----','11:25','11:31','11:35','11:40','11:45']

    ord_389 = ['12:10','-----','12:20','12:23','12:28','12:32','12:37',
               '-----','12:44','12:50','-----','12:57','13:01','13:04',
               '13:11','-----','13:17','-----','13:23','-','13:30']

    ord_279 = ['13:05','-----','13:13','13:15','13:17','13:20','13:24',
               '-----','13:30','13:36','-----','13:42','13:46','13:48',
               '13:55','13:59','14:02','-----','14:08','-----','14:21',
               '-----','14:36','14:42','-----','14:52','15:01','-----',
               '15:14','-----','15:22','-----','-----','15:32','15:39',
               '-----','15:58','16:03','-----','-----','16:12','-----',
               '-----','16:23','-----','-----','16:32','-----','16:37',
               '16:42','16:50','16:58','17:04','17:14','17:27','17:35']

    ord_277 = ['15:25','15:38','15:41','15:43','15:45','15:48','15:52',
               '15:54','15:59','16:05','16:08','16:12','16:16','16:18',
               '16:24','16:27','16:30','16:34','16:37','16:40','16:44',
               '-----','16:59','17:05','-----','17:14','17:21','-----',
               '17:34','-----','17:41','-----','-----','17:50','17:56',
               '-----','18:05','18:11','-----','-----','18:20']

    ord_391 = ['16:35','16:43','16:46','16:50','16:54','16:58','17:02',
               '-----','17:09','17:15','-----','17:22','17:26','17:30',
               '17:37','-----','17:43','-----','17:49','-----','17:55']

    ord_383 = ['17:00','17:09','17:12','-----','17:18','17:23','17:29',
               '17:33','17:40','17:47','17:53','17:58','18:04','18:07',
               '18:17','18:23','18:28','18:34','18:39','18:44','18:50']

    ord_371 = ['17:40','17:49','17:53','17:56','18:02','18:06','18:11',
               '18:13','18:18','18:24','18:29','18:34','18:39','18:42',
               '18:51','18:56','19:01','19:06','19:11','19:16','19:24',
               '-----','19:42','19:50','-----','20:01','20:10','-----',
               '20:25','-----','20:32']

    ord_385 = ['18:25','18:33','18:35','18:37','18:40','18:43','18:47',
               '18:49','18:54','19:00','19:03','19:07','19:11','19:13',
               '19:20','-----','19:26','19:30','19:34','-----','19:40']

    ord_381 = ['18:25','18:34','18:37','-----','18:43','18:47','18:52',
               '18:56','19:02','19:09','19:13','19:17','19:22','19:24',
               '19:33','-----','19:40','19:45','19:49','-----','19:55']

    gotrain = [ord_275, ord_283, ord_285, ord_281, ord_367, ord_389, ord_279,
               ord_277, ord_391, ord_383, ord_371, ord_385, ord_381]
    #อรัญ - กทม
    """
    ord_372 =
    ord_384 =
    ord_278 =
    ord_280 =
    ord_388 =
    ord_368 =
    ord_282 =
    ord_284 =
    ord_276 =
    ord_390 =
    ord_286 =
    ord_394 =
    ord_386 =
    """
    #backtrain = [ord_372, ord_384, ord_278, ord_280, ord_388, ord_368, ord_282,
                 #ord_284, ord_276, ord_390, ord_286, ord_394, ord_386]
    #checkway
    if way == 'go':
        waylist = station
        waysel = gotrain
        trainname = gotrain_name
    else:
        print('Error Pls do again')
        return
    """elif way == 'back':
        waylist = station
        waylist.reverse()
        waysel = backtrain
        trainname = backtrain_name
        """
    #select tontang
    for i in range(len(station)):
        print(i+1,': '+station[i])
    print('Select your first station from number:', end=" ")
    tontang = input()
    #select plaitang show only index > tontang
    for i in range(int(tontang), len(station)):
        print(i+1,': '+station[i])
    print('Select your last station from number:', end=" ")
    plaitang = input()
    #select tontang time - plaitang time
    count = 0
    if choice == 'today':
        for i in range(len(waysel)): 
            if int(plaitang)-1 <= len(waysel[i]) and waysel[i][int(tontang)-1] > now \
               and waysel[i][int(tontang)-1] != '-' and waysel[i][int(plaitang)-1] != '-----':
                print(i, ': '+waysel[i][int(tontang)-1]+" - "+waysel[i][int(plaitang)-1])
                count += 1
    elif choice == '30day':
        pass
    if count == 0:
        print('No Train Schedule Today')
        return
    #choose from choice
    print('Choose Train Type and Schedule Number: ', end='')
    traintype = int(input())
    #show train type
    print('Train Name: '+ trainname[traintype-1])
    #choose how many buy
    print('Buy how many ticket(s): ', end='')
    num = int(input())
    #calculate price
    if int(plaitang) <= 21:
        price = 13
    elif int(plaitang) <= 28:
        price = 23
    elif int(plaitang) <= 31:
        price = 26
    elif int(plaitang) <= 39:
        price = 31
    elif int(plaitang) <= 51:
        price = 40
    elif int(plaitang) <= 56:
        price = 48
    #show price
    print(price*num)
main()
