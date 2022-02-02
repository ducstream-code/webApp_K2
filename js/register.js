function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function growFormUser(){
    let form_container = document.getElementById('user_register_form');
    form_container.style.display = 'flex';
    let login_type_container = document.getElementById('login_type_container');
    login_type_container.style.display = 'none';

}

function lowFormUser(){
    let form_container = document.getElementById('user_register_form');
    form_container.style.display = 'none';
    let login_type_container = document.getElementById('login_type_container');
    login_type_container.style.display = 'flex';



}
