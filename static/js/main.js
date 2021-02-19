$(document).ready(function (){
    setTimeout(function(){
        $('body').addClass('loaded');
    }, 3000)
});

function redirect(target){
    location.href='auth/login.php';
};

