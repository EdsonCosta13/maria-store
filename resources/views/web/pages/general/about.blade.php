@extends('web.layouts.app')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">{{ $page_title }}</h3>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-lg-8 col-8">
                            <h4>Bem-vindo ao RestauDelicias - O Seu Destino Gastronômico Online!</h4>
                            <p>Seja recebido com entusiasmo em nosso universo culinário, onde a tradição encontra a
                                conveniência, e a qualidade é servida à sua porta. RestauDelicias
                                nasceu da paixão pela boa comida e do desejo de proporcionar uma experiência gastronômica
                                extraordinária, sem sair do conforto da sua casa.</p>


                            <p>
                                Somos mais do que uma loja virtual de restaurantes; somos uma equipe dedicada de chefs,
                                amantes da gastronomia e entusiastas da culinária. Nossa jornada começou com a missão de
                                conectar pessoas a sabores excepcionais,
                                oferecendo uma seleção cuidadosamente elaborada de pratos que refletem a diversidade e a
                                autenticidade da cozinha local e internacional.
                            </p>

                            <p><b>O Que Oferecemos:</b></p>
                            <div class="col-12">
                                <div class="col-4">
                                    <span>
                                        <b>
                                            Cardápio Exclusivo
                                        </b>
                                    </span>
                                    <div class="row">
                                        <p>
                                            Explore nosso extenso cardápio, cuidadosamente elaborado para agradar a todos os
                                            paladares.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Adicione mais conteúdo sobre a história, missão e valores da loja -->
                        </div>
                        <div class="col-4 col-md-4 rounded-4">
                            <img style="width:100%; border-radius: 10px;" class="rounded-pill" src="{{asset('/images/piteu.jpg')}}" alt="Imagem da Loja" class="image-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
