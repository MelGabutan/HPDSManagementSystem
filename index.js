// Log In 
function moveUsername() {
	username = document.getElementById("username-title");

	username.style.transform = "translate(-9px, -33px)";
	username.style.color = "#3AAFA9";
	username.style.fontSize = "14px";

}

function movePassword() {
	password = document.getElementById("password-title");

	password.style.transform = "translate(-9px, -33px)";
	password.style.color = "#3AAFA9";
	password.style.fontSize = "14px";
}

// Main
function addProduct()
{
	document.querySelector(".inventory-form").style.display = "flex";
}

function addProductAgain()
{
	document.querySelector(".inventory-form").style.display = "flex";
	document.querySelector(".employee-form").style.display = "none";
	document.getElementById("product-label").style.backgroundColor = "#005595";
}

function hideAddProduct()
{
	document.querySelector(".inventory-form").style.display = "none";
}

function addEmployee()
{
	document.getElementById("employee-label-2").style.backgroundColor = "#005595";
	document.querySelector(".inventory-form").style.display = "none";
	document.querySelector(".employee-form").style.display = "flex";
}

function hideEmployee()
{
	document.querySelector(".employee-form").style.display = "none";
	document.querySelector(".employees-content").style.display = "none";
	document.querySelector(".edit-employee-record").style.display = "none";
}

function manageEmployees() {
	document.querySelector(".product-content").style.display = "none";
	document.querySelector(".employees-content").style.display = "block";
}

function hideEmployeeAgain()
{
	document.querySelector(".employee-form").style.display = "none";
	document.querySelector(".edit-employee-record").style.display = "none";
}

function editEmployee(clicked_id)
{
	form = document.getElementById("edit-form");
	form.innerHTML = form.innerHTML + "<input type=\"hidden\" name=\"id-hidden\" value=" + clicked_id + "\">";
	document.querySelector(".edit-employee-record").style.display = "flex";
}

function login()
{
	window.location.assign("index.php");
}
function manageProducts()
{
	document.querySelector(".product-content").style.display = "block";
	document.querySelector(".employees-content").style.display = "none";
}