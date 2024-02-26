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
                <div class="col-12 col-md-12 mb-4">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <h1>Contacta-nos</h1>
                            <p>Estamos aqui para ajudar. Se você tiver alguma dúvida, sugestão ou feedback, sinta-se
                                à
                                vontade para entrar em contato conosco.</p>
                            <form>
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" id="nome" placeholder="Seu Nome">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Seu Email">
                                </div>
                                <div class="form-group">
                                    <label for="mensagem">Mensagem:</label>
                                    <textarea class="form-control" id="mensagem" rows="4" placeholder="Sua Mensagem"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Enviar Mensagem</button>
                            </form>
                        </div>

                        <div class="col-12 col-md-4">

                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-12 row mt-4" style="margin-top: 24px;">
                    <div class="container mt-4">
                        <h4 class="mt-4 mb-4">Nossa Localização</h4>
                        <div>
                            <iframe style="border-radius: 12px;margin:0px;border:none"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12295.778114035886!2d13.235318770584083!3d-8.830869461976203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f3aedac4418d%3A0x5f87dfcd90942c2a!2sUniversidade%20Cat%C3%B3lica%20de%20Angola!5e0!3m2!1spt-PT!2sao!4v1708965060089!5m2!1spt-PT!2sao"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
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
