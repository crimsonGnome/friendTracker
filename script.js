	const menu = document.querySelector(".handle");
	const nav = menu.parentNode.childNodes[1];

	menu.addEventListener("click", ()=>{ 
		nav.classList.toggle("show")
	});
