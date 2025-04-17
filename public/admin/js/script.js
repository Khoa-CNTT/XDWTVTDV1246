const subMenu = document.querySelectorAll('.sub-menu');
const menuLi = document.querySelectorAll('.admin-sidebar-content > ul > li > a');
    for (let index = 0; index < menuLi.length; index++) {
        menuLi[index].addEventListener('click',(e)=>{
            e.preventDefault()
            for (let i = 0; i < subMenu.length; i++) {
                subMenu[i].setAttribute("style", "height : 0px;")
              
            }
            const submenuHeight =menuLi[index].parentNode.querySelector('ul .sub-menu-item').offsetHeight
            menuLi[index].parentNode.querySelector('ul').setAttribute("style", "height : "+submenuHeight+"px;");
        })
        
    }

    