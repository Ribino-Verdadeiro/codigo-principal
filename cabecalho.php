<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">


</head>

<body>
      
  <div class='cabecalho'>
      
      <div class="containera">
  
      <div class="row">
  
      <div class="col-sm">
          <a href='home.php'><img src="assets/Atelie_Aline21.png" height="100" width="100"></a>
      </div>
  
          <div class="col-sm">
          
              <nav class="navbar">
                  <form class="form-inline mt-5" style="display: flex; position: relative; top: -25px;">
                      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                      <button id='botao' class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                  </form>
              </nav>
  
          </div>
  
          <div class="col-sm" style="display: flex; position: relative; top: 32px;">
          
              <div class="container">
                  <div class="row">
  
                      <div class="col-sm">
                      <a href='listadedesejos.php'> <i class="fa-solid fa-heart fa-2xl" style="margin-top: 20px;"></i> </a>
                      </div>
                      <div class="col-sm">
                      <a href='carrinhodecompras.php'><i class="fa-solid fa-cart-shopping fa-2xl" style="margin-top: 20px;"></i></a>
                      </div>
                      <div class="col-sm">   
                      <button id='botao2' popovertarget='menuu'>                      
                      <i class="fa-solid fa-bars fa-2xl" style="margin-top: 20px;"></i>  
                      </button>                      
                      </div>
  
                  </div>
              </div>
  
          </div>
  
      </div>
  
      </div>
  
    </div>
      
      
<div id="menuu" popover> <!-- div pai -->

 <H1> MENU </H1>

 <div id="sair">    
    <ul class="navbar-nav">
        <li class="nav-item">
        <i class="fa-solid fa-user"></i>
          <a href="logoff.php" class="nav-link">
            Minha Conta!
          </a>
        </li>
    </ul>
  </div>


</div>


</body>

</html>