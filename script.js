var form = document.getElementById("form");
var userName = document.getElementById("user");
var anumber = document.getElementById("anumber");
var pnumber = document.getElementById("pnumber");

form.addEventListener("submit",function(event){
    if(!validateInputs()){
        event.preventDefault();
    }
});
function validateInputs(){
    const usernameVal = userName.value.trim();
    const anumberVal = anumber.value.trim();
    const pnumberVal = pnumber.value.trim();

            if(usernameVal===''){
                setError(userName);
                return false;
            }
            else{
                removeError(userName);
            }
            if(anumberVal===''){
                setError(anumber);
                return false;
            }
            else{
                removeError(anumber);
            }
            if(pnumberVal===''){
                setError(pnumber);
                return false;
            }
            else if( pnumberVal.length > 10 ){
                alert("phone number must be 10 digit");
                setError(pnumber);
                return false;
            }
            else if(pnumberVal.length < 10){
                alert("phone number must be 10 digit");
                setError(pnumber);
                return false;
            }
            else{
                removeError(pnumber);
            }
            return true;
           
}
function setError(element){
    const inputField = element.parentElement;
    inputField.classList.add('error');
} 
function removeError(element){
    const inputField = element.parentElement;
    inputField.classList.remove('error');
} 
