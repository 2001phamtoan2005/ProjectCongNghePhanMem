
<header class="headerHomePage">
    <div class="headerHomePage__logo">
        <img src="<?=base_url("/public/asset/image_login/logo-cube-green1.png")?>" alt="" width="140">
    </div>
    <div class="headerHomePage__info">
        <div class="headerHomePage__dropdown">
            <div class="btnSelectLanguage" >
                <i class="fa-solid fa-globe" style="margin-right:10px"></i>
                <?=session()->get('lang')?>
                <div class="listLanguge">
                    <a class="listLanguage__item"   href="<?=base_url('lang/en')?>"><i class="flag flag-us"></i>America</a>
                    <a class="listLanguage__item"  href="<?=base_url('lang/vn')?>"><i class="flag flag-vn"></i>VietNam</a>
                </div>
            </div>
        </div>
        <div class="headerHomePage__profile">
            <i class="headerHomePage__profile-icon fa-solid fa-circle-user"></i>
            <span> Administrator <?= session()->get('users') ? session()->get('users')['login_id'] : " "?></span>
        </div>

    </div>
    
</header>
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebarTop">
            <div class="sidebarBars"><i class="sidebarBarsIcon fa-solid fa-bars"></i></div>
        </div>
        <ul class="sidebarList">
            <li class="sidebarItem active"> 
                <a href="<?=base_url('home')?>" class="sidebarItem__link" id="home"><i class='sidebarIcon fas fa-home'></i>
                    <span ><?php echo lang('component.Home'); ?> </span>
                </a>
            </li>
            <li class="sidebarItem">
                <a href="<?=base_url('userlist')?>" class="sidebarItem__link" id="userlist"> <i class='sidebarIcon fas fa-users'></i> <span
                        ><?php echo lang('component.UserList'); ?> </span>
                </a>
            </li>
            <li class="sidebarItem">
            <a href="<?=base_url('course')?>" class="sidebarItem__link" id="course"> <i class="sidebarIcon fas fa-book"></i> <span
                        ><?php echo lang('component.Courses'); ?> </span>
                </a>
            </li>
            <li class="sidebarItem">
                <a href="<?=base_url('position')?>" class="sidebarItem__link" id="position"> <i class='sidebarIcon fas fa-briefcase nav_icon'></i> <span
                    ><?php echo lang('component.Position'); ?> </span>
                </a>
            </li>
            <li class="sidebarItem">
                <a href="<?=base_url('equipment')?>" class="sidebarItem__link" id="equipment"> <i class='sidebarIcon fas fa-user nav_icon'></i> <span
                        ><?php echo lang('component.Equipment'); ?> </span>
                </a>
            </li>
            <li class="sidebarItem">
                <a href="<?=base_url('department')?>" class="sidebarItem__link" id="department"> <i class='sidebarIcon fas fa-building nav_icon'></i> <span
                        ><?php echo lang('component.Department'); ?> </span>
                </a>
            </li>
            <li class="sidebarItem">
                <a href="<?=base_url('config')?>" class="sidebarItem__link" id="config"> <i class="sidebarIcon fas fa-cogs"></i> <span
                        ><?php echo lang('component.Config'); ?> </span>
                </a>
            </li>
            <li class="sidebarItem">
                <a href="<?=base_url('manager')?>" class="sidebarItem__link" id="managerequipment"> <i class="sidebarIcon fas fa-cogs"></i> <span
                        ><?php echo lang('component.managerequipment'); ?> </span>
                </a>
            </li>

        </ul>
        <div class="sidebarBot">
            <div class="sidebarItem">
                <a href="<?=base_url('logout')?>" class="sidebarItem__link">
                    <i class="sidebarIcon fas fa-sign-out-alt"></i>
                    <span >SignOut</span>
                </a>
            </div>
        </div>
    </div>
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>
</div>


<script>
    // by Toan
    
    // handle minimize sidebar
    const toggleBar= document.querySelector('.sidebarBarsIcon');
    toggleBar.addEventListener('click', ()=>{
        document.querySelector('.sidebar').classList.toggle('minimize')
        document.querySelector('.content').classList.toggle('expand')
    })
    // hanlde active item sidebar
    const listitem = document.querySelectorAll('.sidebarItem__link')
    const pathname = window.location.pathname.replace('/csv_management/CSV_Management/','').trim();
  
    for(var item of listitem){
        console.log(pathname,item.id,pathname==item.id, item.parentElement)
        if(pathname==item.id){
            item.parentElement.classList.add('active')
        }
        else{
            item.parentElement.classList.remove('active')
        }
    }

    // handle dropdown select language
    const btnSelectLang =document.querySelector('.listLanguge');
    document.querySelector('.btnSelectLanguage').addEventListener('click',()=>{
       btnSelectLang.classList.toggle('selected')
    })

    window.addEventListener('click',(e)=>{
        if(e.target != document.querySelector('.btnSelectLanguage')){
           btnSelectLang.classList.remove('selected')
        }
    })

</script>
<script>
   const eng = document.getElementById('EN');
    const language = document.getElementById('language_slect');
    const vn = document.getElementById('VN');
   eng.addEventListener('click',() =>{
       language.textContent = 'EN'
       <?php session()->set('langue',"EN");?>      
   }),
   vn.addEventListener('click',() =>{
      language.textContent = 'VN'
      <?php  session()->set('langue',"VN");?> 
   })
</script>