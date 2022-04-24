
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const btnSubmit = $('#btnSubmit')
const resStateLogin = $('#alertStateLogin')
const response=$('.response');
const message=$('.message');


const loginPage={

    isVisiblePassword:false,
    
    handleVisiblePassword() {
        const iconVisible = $('.input__icon-visible');
        const iconHidden = $('.input__icon-hidden');
        const inputPassword = $('#txtpassword');


        const onVisiblePass = ()=>{
            this.isVisiblePassword==false ? 
            inputPassword.setAttribute('type','text'):
            inputPassword.setAttribute('type','password');
            iconVisible.classList.toggle('active')
            iconHidden.classList.toggle('active');
            this.isVisiblePassword=!this.isVisiblePassword;

        }

        iconVisible.addEventListener('click',onVisiblePass)
        iconHidden.addEventListener('click',onVisiblePass)
    },

    responseLoginState(){
        const data=resStateLogin.innerHTML.trim();
        if(data){
            console.log(data)
            setTimeout(()=>{
                response.classList.add('visible');
                message.innerHTML=`${data}`;
            },500)

            setTimeout(()=>{
                response.classList.remove('visible');
                message.innerHTML=`${data}`;
            },3000)
        }
    },
    start(){
        this.handleVisiblePassword();
        this.responseLoginState();
    }
};


loginPage.start();