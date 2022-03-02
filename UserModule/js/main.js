let introLimit = (element) => {
    const maxChar = 300;
    let ele = document.getElementById(element.id);
    let charLen = ele.value.length;
    let p = document.getElementById('charCounter');
    p.innerHTML = maxChar - charLen + ' characters remaining';
    
    if (charLen > maxChar){
        ele.value = ele.value.substring(0, maxChar);
        p.innerHTML = 0 + ' characters remaining'; 
    }
}

let desc2Limit = (element) => {
    const maxChar = 500;
    let ele = document.getElementById(element.id);
    let charLen = ele.value.length;
    let p = document.getElementById('char2Counter');
    p.innerHTML = maxChar - charLen + ' characters remaining';
    
    if (charLen > maxChar){
        ele.value = ele.value.substring(0, maxChar);
        p.innerHTML = 0 + ' characters remaining'; 
    }
}