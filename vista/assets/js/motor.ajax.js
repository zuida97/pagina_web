function CrearInstanciaXMLHttp()
{
  if(window.XMLHttpRequest)
  {
    instancia = new XMLHttpRequest();
  }else{
    alert('Actualice su navegador web.');
  }
  return instancia;
}

xmlhttp = CrearInstanciaXMLHttp();

function login()
{
  if(xmlhttp)
  {
    var user = document.getElementById('user').value;
    var pass = document.getElementById('pass').value;
    if(user!="" && pass!="")
    {
        post = "u=" + user + "&p=" + pass;
        xmlhttp.onreadystatechange = estadoLogin;
        xmlhttp.open("POST","../controlador/controlador.usuario.php",true);
        xmlhttp.send(post);
    }else{
      alert('Ingrese usuario y clave.');
    }
  }
}
function estadoLogin()
{
  if(xmlhttp.readyState == 1)
  {
    xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  }
  if(xmlhttp.readyState == 4)
  {
    if(xmlhttp.status == 200)
    {
      var resp = xmlhttp.responseText;
      if(resp)
      {
        window.location.href = '../controlador/controlador.usuario.php';
      }else{
        document.getElementById('resp-ajax').innerHTML = 'Usuario o clave incorrectos.';
      }
    }else{
      alert(xmlhttp.status + ' : ' + xmlhttp.statusText);
    }
  }
}
