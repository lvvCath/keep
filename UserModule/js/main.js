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

let descEduLimit = (element) => {
    const maxChar = 500;
    let ele = document.getElementById(element.id);
    let charLen = ele.value.length;
    let p = document.getElementById('descEduLimit');
    p.innerHTML = maxChar - charLen + ' characters remaining';
    
    if (charLen > maxChar){
        ele.value = ele.value.substring(0, maxChar);
        p.innerHTML = 0 + ' characters remaining'; 
    }
}

let descExpLimit = (element) => {
    const maxChar = 500;
    let ele = document.getElementById(element.id);
    let charLen = ele.value.length;
    let p = document.getElementById('descExpLimit');
    p.innerHTML = maxChar - charLen + ' characters remaining';
    
    if (charLen > maxChar){
        ele.value = ele.value.substring(0, maxChar);
        p.innerHTML = 0 + ' characters remaining'; 
    }
}

let descServiceLimit = (element) => {
    const maxChar = 250;
    let ele = document.getElementById(element.id);
    let charLen = ele.value.length;
    let p = document.getElementById('descServiceLimit');
    p.innerHTML = maxChar - charLen + ' characters remaining';
    
    if (charLen > maxChar){
        ele.value = ele.value.substring(0, maxChar);
        p.innerHTML = 0 + ' characters remaining'; 
    }
}

let descWorkLimit = (element) => {
    const maxChar = 500;
    let ele = document.getElementById(element.id);
    let charLen = ele.value.length;
    let p = document.getElementById('descWorkLimit');
    p.innerHTML = maxChar - charLen + ' characters remaining';
    
    if (charLen > maxChar){
        ele.value = ele.value.substring(0, maxChar);
        p.innerHTML = 0 + ' characters remaining'; 
    }
}


// Toggle Tips
$(function () {
    $("#switch-tips").change(function () {
        if ($(this).is(":checked")) {
            $(".tips").show();
        } else {
            $(".tips").hide();
        }
    });
});

// Toggle Tips
$(function () {
    $("#switch-public_view").change(function () {
        if ($(this).is(":checked")) {
            $(".main-edit-ico").hide();
            $(".page-header").hide();
            $(".main-add-ico").hide();
        } else {
            $(".main-edit-ico").show();
            $(".page-header").show();
            $(".main-add-ico").show();


        }
    });
});

// Date Picker (Year)
$(document).ready(function(){
    $("#year_edu").datepicker({
       format: "yyyy",
       viewMode: "years", 
       minViewMode: "years",
       autoclose:true
    });   
  })

//   let startDate_exp = document.getElementById('startDate_exp')
//   let endDate_exp = document.getElementById('endDate')
  
//   startDate_exp.addEventListener('change',(e)=>{
//     let startDate_exp_Val = e.target.value
//     document.getElementById('startDate_exp_Selected').innerText = startDate_exp_Val
//   })
  
//   endDate_exp.addEventListener('change',(e)=>{
//     let endDate_exp_Val = e.target.value
//     document.getElementById('endDate_exp_Selected').innerText = endDate_exp_Val
//   })  