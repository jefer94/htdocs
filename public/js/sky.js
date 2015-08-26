/*
 * SKY Framework
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License version 2 as published by
 * the Free Software Foundation.
 */

function change() {
	container=document.getElementById("container");
	nav=document.getElementById("nav");
	text=document.getElementById("text");
	btn=document.getElementById("btn");
	if (container.className=="col-9 col-offset-3 overflow left animation") {
		text.className="none";
		nav.className="none animation";
		container.className="col-12 col-offset-0 overflow left animation";
		btn.value="Mostrar";
	}
	else {
		text.className="animation";
		nav.className="nav col-3 left animation";
		container.className="col-9 col-offset-3 overflow left animation";
		btn.value="Ocultar";
	}
}