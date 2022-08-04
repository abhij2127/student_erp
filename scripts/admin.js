"use strict";


let x = [...document.getElementsByTagName("td")];
x.forEach((element)=>{
	element.style.textAlign = "center";
});

//Handler code for switch between views
let contents = document.getElementById("contents");
let students = document.getElementById('students');
let applicants = document.getElementById('applicants');
let courses = document.getElementById('courses');

let studentBtn = document.getElementById('studentBtn');
let applicantBtn = document.getElementById('applicantBtn');
let courseBtn = document.getElementById('courseBtn');
let tabcont = [...contents.children];
let sidebar_contents = [...document.getElementsByClassName('sdbarCont')];
const makeAllDisable = ()=>{
	tabcont.forEach((element,i)=>{
		element.style.display = "none";
	})
} 


applicantBtn.addEventListener('click',()=>{
	makeAllDisable();
	applicants.style.display = "block";
});


courseBtn.addEventListener('click',()=>{
	makeAllDisable();
	courses.style.display = "block";
});


studentBtn.addEventListener('click',()=>{
	makeAllDisable();
	students.style.display = "block";
});

//function to reject a candidate

function del(sid){
	let target_form = document.getElementById('del');
	let id_in = target_form.children[0];
	let targetbtn = target_form.children[1];
	id_in.value = sid;
	targetbtn.click();
	
}

//driver code for rejecting a candidate
let rejectBtns = [...document.getElementsByClassName("reject")];

rejectBtns.forEach((btn)=>{
    btn.addEventListener('click',(e)=>{
       if(confirm("Are You Sure you wanna fuck")){
		   del(e.target.id);
	   }
    })
});


sidebar_contents.forEach((element)=>{
    element.addEventListener('click',(e)=>{
		sidebar_contents.forEach((l)=>{
			l.classList.remove('activeSdbar');
		})
		console.log(e);
		e.target.classList.add('activeSdbar');
	})
})
