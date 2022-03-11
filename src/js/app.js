const crossAlert = document.querySelectorAll('.bi'); 

crossAlert.forEach(element => {
    element.addEventListener('click', e =>{
        
        const item = e.target.parentElement;
        const re = item.parentElement;
        re.removeChild(item)
        
    })
});