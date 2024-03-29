<?php
if(lang=="EN") {
    define("c_login", "Login");
    define("c_signup", "Sign Up");
    define("c_passwordIncorrect" , "Password Incorrect");
    define("c_usernameDoesntExist" , "Username not exist");
    define("c_username", "username :");
    define("c_password", "password :");
    define("c_signupnow", "Sign Up Now");
    define("c_resetPassword", "Reset Password");
    define("c_passwordConfiguration", "Password Configuration :");
    define("c_enterPasswordConfiguration"," Enter Password Configuration");
    define("c_selectRole", "Select Role :");
    define("c_charity", "Charity :");
    define("c_restaurant", "Resturant");
    define("c_driver", "Driver");
    define("c_securityQuestion", "Security Question:");
    define("c_answer", "Answer :");
    define("c_food_needed","food needed");
    define("c_alreadyHaveAcount", "Already have an acount ?");
    define("c_enterQuestionAswer","Enter question answer");
    define("c_enterAswer","Enter Answer");
    define("c_checkAnswer","Check answer");
    define("c_enterNewPassword","Enter new password");
    define("c_newPassword","New password :");
    define("c_enterUsername","Enter username");
    define("c_enterPassword","Enter password");
    define("c_setResetPassword","Set reset password");
    define("c_haveAcount","Have Acount");
    define("c_Username_exists", "Username exists. choose another one.");
    define("c_Passwords_not_match" , "Passwords not match.");
    define("c_PasswordTooShort" ,"Password too short!");
    define("c_PasswordMustIncludeNum" , "Password must include at least one number!");
    define("c_PasswordMustIncludeLetter" , "Password must include at least one letter!");
    define("c_wrongAnswer" ,"Wrong answer!");
    define("c_checkUsername" , "Check Username");
    define("c_drivers" , "Drivers");
    define("c_restaurants"  , "Restaurants");
    define("c_charities" , "Charities");
    define("c_logout" , "Logout");
    define("c_dashboard" , "Dashboard");
    define("c_requestsList" , "Requests List");
    define("c_status" , "Status");
    define("c_statusUpdated" , "Status Updated.");
    define("c_driverDashboard" , "Driver Dashboard");
    define("c_changeStatusLocationAndZone" , "Change status, location and zone:");
    define("c_available" , "Available");
    define("c_unavailable" ,"Unavailable");
    define("c_busy" , "Busy");
    define("c_zone" , "Zone:");
    define("c_enterZone" , "Enter zone");
    define("c_updateStatus" , "Update Status");
    define("c_delivered" , "Delivered");
    define("c_currentRequest" , "Current Request:");
    define("c_from" , "From:");
    define("c_to" ,"To:");
    define("c_number" , "Number:");
    define("c_availableDrivers" , "Available Drivers");
    define("c_registrationComplete" , "Registration Complete");
    define("c_firstName" , "First Name:");
    define("c_lastName" , "Last Name:");
    define("c_nationalID" , "National ID*:");
    define("c_coveredArea" , "Covered Area*:");
    define("c_birthday" , "Birthday*:");
    define("c_carPlate" , "Car Plate*:");
    define("c_carColor" , "Car Color*:");
    define("c_enterFirstName" , "Enter first name");
    define("c_enterLastName" , "Enter last name");
    define("c_enterNationalID" , "Enter national ID");
    define("c_enterCoveredArea" , "Enter covered area");
    define("c_enterYourFullBirthday" , "Enter your full birthday");
    define("c_enterFullCarsPlate" , "Enter full car's plate");
    define("c_enterFullCarsColor" , "Enter full car's color");
    define("c_enterLat" , "Enter Lat");
    define("c_enterLong" , "Enter Long");
    define("c_requests" , "Requests");
    define("c_Date" , "Date");
    define("c_charityDashboard" , "Charity Dashboard");
    define("c_CharityName" , "Charity Name*:");
    define("c_EnterCharityName" , "Enter Charity Name");
    define("c_EstablishedYear" , "Established Year*:");
    define("c_EnterEstablishedYear" , "Enter Established Year");
    define("c_NumberOfPeopleCovered" , "Number of people covered*:");
    define("c_EnterNumberOfPeopleCovered" , "Enter number of people covered");
    define("c_Address" , "Address");
    define("c_EnterCity" , "Enter City");
    define("c_Street" , "Street:");
    define("c_EnterStreet" , "Enter Street");
    define("c_No" , "No:");
    define("c_EnterNo" , "Enter No");
    define("c_city" , "city:");
    define("c_Number" , "Number:");
    define("c_LatestDonatedFoods" , "Latest donated foods:");
    define("c_Food" , "Food");
    define("c_Rate" , "Rate");
    define("c_TheNumberOfFoodsNeededToday" , "The number of foods needed today:");
    define("c_Update" , "update");
    define("c_welcome" , " Welcome");
    define("language" , "language");

    //restaurant
    define("c_restaurantName", "Restaurant Name*:");
    define("c_EnterRestaurantName", "Enter Restaurant Name");
    define("c_ContractCharities" , "Contract Charities");
    define("c_AddNewCharity" , "Add New Charity:");
    define("c_Insert" , "Insert");
    define("c_NoItemToAdd" , "No item to add.");
    define("c_AllCharities" , "All Charities:");
    define("c_delete" , "delete");
    define("c_ResturantDashboard" , "Resturant Dashboard");
    define("c_NewRequest" , "New Request");
    define("c_AddNewRequest" , "Add New Request:");
    define("c_Submit" , "Submit");
    define("c_AllRequests" , "All Requests:");
    define("c_Time" , "Time");
    define("c_ContractedWithYourContractedCharities" , "Contracted with your contracted charities:");

    //admin

    define("c_NeedfulCharityByCoveredPeople","Needful Charity by covered people:");
    define("c_persons","persons.");
    define("c_foods","foods.");
    define("c_resturant","resturant.");
    define("c_AverageDailyFoodNumberByZone","Average daily food number by zone:");
    define("c_NeededFoodNumber","Needed Food Number");
    define("c_NeedfulCharityByRecievedFoods" , "Needful Charity by recieved foods:");
    define("c_NeedfulCharityByContractedResturants", "Needful Charity by contracted resturants:");

    define("c_AdminDashboard" , "Admin Dashboard");
    define("c_TodayTopRequests" , "Today Top Requests:");
    define("c_DriversRate" , "Drivers rate > 5:");
    define("c_NationalIDriver" , "National ID");
    define("c_RateAverage" , "Rate Average");
    define("c_Min_MAX" ,"Min-Max Rating:");
    define("c_MinRate" , "Min Rate");
    define("c_MaxRate" , "Max Rate");
    define("c_TodayActivestDriver" , "Today activest driver:");

    define("c_projectName" , "Charity");
    define("c_welcomeMessage" , "Welcome to food donate system");

    define("c_DriverRateSubmitted" , "Driver rate submitted");
    define("c_NumberUpdated" , "Number updated.");
    define("c_pending" , "pending");

    define("c_about" , "The Charity is a free food distribution system in which restaurants serve some extra food at the end of each day.
            They are sent to charities by volunteer drivers. In this system, a number of charities, restaurants and drivers can
            Register.");
    define("c_successEmailSend" , "Your contact information is received successfully.");
    define("c_defeatEmailSend" , "Somethings are wrong,try again");
    define("c_nameEmail" , "Your name");
    define("c_Email" , "Email address");
    define("c_YourEmail" , "Your Email");
    define("c_EmailMessage" , "Message");
    define("c_YourMessage" , "enter your message here!");
    define("c_WeNever" , "We'll never share your email with anyone else.");
    define("c_send" , "Send");
    define("c_EmailName", "Name");
    define("c_Contact" , "Contact Us");
    define("c_ResturanName", "restaurant name :*");
    define("c_EnterResturantName", "enter your restaurant name");







}
else
{
    define("c_login", "ورود");
    define("c_signup", "ثبت نام");
    define("c_passwordIncorrect" , "رمز عبور نادرست است");
    define("c_usernameDoesntExist" , "کاربری یافت نشد");
    define("c_username", " نام کاربری :");
    define("c_password", " رمزعبور : ");
    define("c_signupnow", "ثبت نام کنید");
    define("c_resetPassword", " فراموشی رمز عبور");
    define("c_passwordConfiguration", "تکرار رمز عبور :");
    define("c_enterPasswordConfiguration"," تکرار رمز عبور را وارد کنید");
    define("c_selectRole", " انتخاب نقش : ");
    define("c_charity", "خیریه");
    define("c_restaurant", "رستوران");
    define("c_driver", "راننده");
    define("c_securityQuestion", " سوال امنیتی :");
    define("c_securityEnterAnswer", " سوال امنیتی :");
    define("c_answer", " پاسخ :");
    define("c_alreadyHaveAcount", "حساب کاربری دارید ؟");
    define("c_enterQuestionAswer","پاسخ سوال را وارد کنید");
    define("c_food_needed" , "تعداد غذاهای مورد نیاز");
    define("c_checkUsername","جست و جو نام کاربری");
    define("c_enterAswer","پاسخ را وارد کنید");
    define("c_checkAnswer","بررسی پاسخ");
    define("c_enterNewPassword","رمز ورود جدید را وارد کنید ");
    define("c_newPassword"," : رمز عبور جدید");
    define("c_enterUsername","نام کاربری را وارد کنید");
    define("c_enterPassword","رمز عبور را وارد کنید");
    define("c_Username_exists", "نام کاربری موجود است، لطفا نام کاربری دیگری انتخاب کنید");
    define("c_setResetPassword","ثبت رمز عبور جدید ");
    define("c_haveAcount"," حساب کاربری دارید ");
    define("c_Passwords_not_match" , "تکرار رمز عبور اشتباه است");
    define("c_PasswordTooShort" ,"پسورد کوتاه است!");
    define("c_PasswordMustIncludeNum" , "رمز عبور باید حداقل یک عدد داشته باشد!");
    define("c_PasswordMustIncludeLetter" , "رمز عبور باید حداقل یک حرف داشته باشد!");
    define("c_wrongAnswer" ,"پاسخ اشتباه است!");
    define("c_drivers" , "رانندگان");
    define("c_restaurants"  , "رستوران ها");
    define("c_charities" , "خیریه ها");
    define("c_logout" , "خروج");
    define("c_dashboard" , "داشبورد");
    define("c_requestsList" , "لیست درخواست ها");
    define("c_status" , "وضعیت");
    define("c_statusUpdated" , "وضعیت آپدیت شد.");
    define("c_driverDashboard" , "داشبورد راننده");
    define("c_changeStatusLocationAndZone" , "تغییر وضعیت ، مختصات و منطقه");
    define("c_available" , "دردسترس");
    define("c_unavailable" ,"غیر قابل دسترس");
    define("c_busy" , "مشغول");
    define("c_zone" , "منطقه:");
    define("c_enterZone" , "منطقه را وارد کنید");
    define("c_updateStatus" , "بروزرسانی");
    define("c_delivered" , "ارسال شد");
    define("c_currentRequest" , "درخواست های حال حاضر:");
    define("c_from" , "از:");
    define("c_to" ,"به:");
    define("c_number" , "شماره:");
    define("c_availableDrivers" , "رانندگان دردسترس");
    define("c_registrationComplete" , "تکمیل ثبت نام");
    define("c_firstName" , "نام");
    define("c_lastName" , "نام خانوادگی");
    define("c_nationalID" , "کد ملی *");
    define("c_coveredArea" , "*ناحیه تحت پوشش");
    define("c_birthday" , "تاریخ تولد*");
    define("c_carPlate" , "مدل ماشین*");
    define("c_carColor" , "*رنگ ماشین:");
    define("c_enterFirstName" , "نام خود را وارد کنید:");
    define("c_enterLastName" , "نام خانوادگی خود را وارد کنید:");
    define("c_enterNationalID" , "کد ملی خود را وارد کنید");
    define("c_enterCoveredArea" , "ناحیه تحت پوشش خود را وارد کنید");
    define("c_enterYourFullBirthday" , "تاریخ تولد  خود را وارد کنید");
    define("c_enterFullCarsPlate" , "مدل ماشین خود را وارد کنید");
    define("c_enterFullCarsColor" , "رنگ ماشین خود را وارد کنید");
    define("c_enterLat" , "lat خود را وارد کنید");
    define("c_enterLong" , "long خود را وارد کنید");
    define("c_requests" , "درخواست ها");
    define("c_Date" , "تاریخ");
    define("c_charityDashboard" , "داشبورد خیریه");
    define("c_CharityName" , "نام خیریه:*");
    define("c_EnterCharityName" , "نام خیریه را وارد کنید:");
    define("c_EstablishedYear" , "سال احداث:*");
    define("c_EnterEstablishedYear" , "سال احداث را وارد کنید");
    define("c_NumberOfPeopleCovered" , "تعداد افراد تحت پوشش :*");
    define("c_EnterNumberOfPeopleCovered" , "افراد تحت پوشش را وارد کنید");
    define("c_Address" , "آدرس");
    define("c_EnterCity" , "شهر را وارد کنید");
    define("c_Street" , "خیابان:");
    define("c_EnterStreet" , "خیابان را وارد کنید");
    define("c_No" , "پلاک:");
    define("c_EnterNo" , "پلاک را وارد کنید");
    define("c_city" , "شهر:");
    define("c_Number" , "تعداد:");
    define("c_LatestDonatedFoods" , "آخرین غذا های اهدا شده:");
    define("c_Food" , "غذا");
    define("c_Rate" , "امتیاز");
    define("c_TheNumberOfFoodsNeededToday" , "تعداد غذا های مورد نیاز امروز:");
    define("c_Update" , "بروزرسانی");
    define("c_welcome" , " خوش آمدید");
    define("c_ContractCharities" , "خیریه های طرف قرارداد");
    define("c_AddNewCharity" , "اضافه کردن خیریه:");
    define("c_Insert" , "اضافه کردن");
    define("c_NoItemToAdd" , "خیریه دیگری وجود ندارد.");
    define("c_AllCharities" , "خیریه ها:");
    define("c_delete" , "پاک کردن");
    define("c_ResturantDashboard" , "داشبورد رستوران");
    define("c_ResturanName", "نام رستوران :*");
    define("c_EnterResturantName", "نام رستوران را وارد کنید");
    define("c_NewRequest" , "درخواست جدید");
    define("c_AddNewRequest" , "اضافه کردن درخواست:");
    define("c_Submit" , "ارسال");
    define("c_AllRequests" , "همه درخواست ها");
    define("c_Time" , "زمان");
    define("c_ContractedWithYourContractedCharities" , "قرار داد های بسته شده با خیریه ها");

    define("c_NeedfulCharityByCoveredPeople","خیریه های نیازمند به ترتیب افراد تحت پوشش");
    define("c_persons","افراد");
    define("c_foods","غذاها");
    define("c_resturant","رستوران");
    define("c_AverageDailyFoodNumberByZone","میانگین تراکنش غذا به ترتیب منطقه");
    define("c_NeededFoodNumber","تعداد غذای مورد نیاز");
    define("c_NeedfulCharityByRecievedFoods" , "خیریه های نیازمند به ترتیب تعداد غذاهای دریافت شده");
    define("c_NeedfulCharityByContractedResturants", "خیریه های نیازمند به ترتیب رستوران های طرف قرارداد");
    define("c_AdminDashboard" , "داشبورد ادمین");
    define("c_TodayTopRequests" , "بیشترین درخواست های امروز");
    define("c_DriversRate" , "امتیاز راننده >5");
    define("c_NationalIDriver" , "کد ملی");
    define("c_RateAverage" , "میانگین امتیاز");
    define("c_Min_MAX" ,"بیشترین - کمترین امتیاز");
    define("c_MinRate" , "کمترین امتیاز");
    define("c_MaxRate" , "بیشترین امتیاز");
    define("c_TodayActivestDriver" , "فعالیت امروز رانندگان");
    define("language" , "زبان");
    define("c_projectName" , "خیریه");
    define("c_welcomeMessage" , "به سامانه اهدا غذا خوش آمدید");
    define("c_DriverRateSubmitted" , "امتیاز راننده ثبت شد.");
    define("c_NumberUpdated" , "تعداد غذا ها بروزرسانی شد !");
    define("c_pending" , "انتظار");
    define("c_about" , " خیریه مربوط به يك سيستم توزيع رايگان غذاست كه در آن رستوران ها در پايان هر روز تعدادي غذاي اضافي را
توسط رانندگان داوطلب به خيريه ها ارسال ميكنند.در اين سيستم تعدادي خيريه،رستوران،راننده مي توانند                        
ثبت نام كنند.                       ");
    define("c_successEmailSend" , "بازخورد شما با موفقیت به ادمین ایمیل شد!");
    define("c_nameEmail" , "نام شما");
    define("c_Email" , "ایمیل");
    define("c_YourEmail" , "ایمیل شما");
    define("c_EmailMessage" , "پیام");
    define("c_YourMessage" , "پیام خود را وارد کنید!");
    define("c_WeNever" , "ماهرگز ایمیل شما را در اختیار کسی نمیگذاریم!");
    define("c_send" , "ارسال");
    define("c_EmailName", "اسم");
    define("c_Contact" , "ارتباط با ما");
    define("c_defeatEmailSend" , "مشکلی پیش آمده است ، دوباره امتحان کنید");







}