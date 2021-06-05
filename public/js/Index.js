var mapa = document.getElementById('Mapa');

function Mostrar(Id)
{
    if(Id=="Lagos")
    {
        mapa.src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d464.50132998594097!2d-101.9350834659558!3d21.35007554180401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1622677801162!5m2!1ses-419!2smx";
    }
    else if(Id=="Leon")
    {
        mapa.src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d232.60883576805477!2d-101.6814045452882!3d21.12287473544373!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1622678210575!5m2!1ses-419!2smx";
    }
    else if(Id=="SanJuan")
    {

        mapa.src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d464.8434786275822!2d-102.33615008098562!3d21.241845998431195!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1622678071278!5m2!1ses-419!2smx";

    }
    else if(Id=="Aguas")
    {
        mapa.src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d591.5789831152749!2d-102.29646040013816!3d21.879159565914335!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1622678295966!5m2!1ses-419!2smx";
    }

}
function categoria(categoria)
{
    var boton = document.getElementById('Boton');
    console.log(categoria);
}
