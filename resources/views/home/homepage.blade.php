@extends('layout-home')

@section('mainContent')
  <section class="home-b">
    <div class="home-banner">
      <div class="home-banner-txt">
        <img src="../img/banner.png" alt="" />
      </div>
    </div>
    <div class="home-banner-bg">
      <div class="home-banner-title">
        <h2>minima<span>List</span></h2>
      </div>
    </div>
  </section>
  <section class="home-a">
    <div class="home-about">
      <h2>minima<span>List</span></h2>
      <p>
        minimaList est la manière la plus simple de mener à bien toutes vos tâches.
        Que vous souhaitiez planifier vos vacances, gérer plusieurs projets professionnels,
        minimaList est là pour vous aider à réaliser toutes vos tâches personnelles et professionnelles.
      </p>
      <div class="home-about-create">
        <a title="Créer un compte" href="/auth/register">Créer un compte gratuitement</a>
      </div>
    </div>
  </section>
  <section class="home-f">
    <div class="home-features">
      <div class="home-features-projects home-features-div">
        <div class="home-features-width">
          <div class="home-features-div-div">
            <img src="../img/projects2.png" alt="icon projet" />
            <h3>Organiser par projets</h3>
            <div class="home-features-txt">
              <p>
                Organisez vos listes de tâches, de travail, de courses, de films et de tâches ménagères.
                Peu importe ce que vous planifiez ou l’ampleur de la tâche, minimaList vous permet de tout réaliser très facilement.
              </p>
            </div>
          </div>
          <div class="home-features-div-img">
            <img src="../img/mac2.png" alt="image illustrative d'un ordinateur" />
          </div>
        </div>
      </div>
      <div class="home-features-etiquettes home-features-div">
        <div class="home-features-width">
          <div class="home-features-div-img">
            <img src="../img/tablette.png" alt="image illustrative d'une tablette" />
          </div>
          <div class="home-features-div-div">
            <img src="../img/etiquettes2.png" alt="icon étiquette" />
            <h3>Lister par étiquettes</h3>
            <div class="home-features-txt">
              <p>
                En plus d'organiser vos tâches par projets ou par date, vous pouvez également les organiser grâce au système d'étiquette.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="home-features-responsive home-features-div">
        <div class="home-features-width">
          <div class="home-features-div-div">
            <img src="../img/responsive2.png" alt="icon responsive" />
            <h3>Peu importe le support</h3>
            <div class="home-features-txt">
              <p>
                À l'heure actuelle, il est primordiale pour un site web ou une application d'être adaptable sur tous les supports.
                Vous êtes sur ordinateur, mac, tablette ou smartphone ? Aucuns soucis pour minimaList !
                Vous pouvez donc planifier votre temps et votre travail n'importe où et n'importe quand.
              </p>
            </div>
          </div>
          <div class="home-features-div-img">
            <img src="../img/gsm.png" alt="image illustrative d'un smartphone" />
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
