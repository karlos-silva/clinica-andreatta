<?php

session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}

require_once '../server php/db_connect.php';

include_once 'header.php';
?>

<div class="texto-logo">
      <img class="logo"src="../../img/logo.png" alt="">
      <span>Clínica Andreatta</span>
  </div>
  <div class="text">
  <p>Especialista em oftalmologia</p>
  </div>


  <main class="principal">
        
        <div class="sobre-oftalmo">
          <div class="alinha-texto">
              <i class="fas fa-eye fa-3x"></i>
              <h2 class="titulo">Sobre Oftalmologia</h2 class="titulo">
          </div>
            <p>A oftalmologia é uma especialidade médica que investiga, estuda, diagnostica e trata as 
            doenças relacionadas com os olhos, com a visão e estruturas afins, tais como: astigmatismo,
            ambliopia, catarata, degeneração macular, toxoplasmose e tumores oculares, pterígio, etc</p>
        </div>

        <div class="about-us">
          <div class="alinha-texto">
              <i class="fas fa-users fa-3x"></i>
              <h2 class="titulo">Time de Desenvolvimento</h2 class="titulo">
          </div>
            <p> Karlos Eduardo</br>
                Denis Oliveira</br>
                Bernardo Andreatta
            </p>
        </div>
        <div class="contato">
          <div class="alinha-texto">
            <i class="fas fa-map-marker-alt fa-3x fa-pull-center"></i>
            <h2 class="titulo">Endereço</h2 class="titulo">
          </div>
            <p>R. Imac. Conceição, 1155 - Prado Velho, Curitiba - PR, 80215-901</p>


        </div>

  </main>

<?php
include_once 'footer.php'
?>