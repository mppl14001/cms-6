@extends('devise::layouts.public')

@section('content')
    <div class="container pt sp45">

        <div class="tac mb sp75">
            <img src="<?= URL::asset('/packages/devisephp/cms/img/admin-logo.png') ?>">
        </div>

        @if(Session::has('message-success') || Session::has('message-errors'))
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4">
                @include('devise::admin.elements.validation')
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-4 col-md-offset-4 tac">
                <?= Form::open(array('method' => 'POST', 'route' => 'user-attempt-login')) ?>

                    @if(URL::previous() && Request::url() != URL::previous())
                        <input type="hidden" name="intended" value="<?= URL::previous() ?>">
                    @endif

                    <div class="form-group">
                        <input name="email" type="text" class="form-control" placeholder="Email" value="<?= old('email') ?>" />
                    </div>

                    <div class="form-group">
                        <input name="password" type="password" class="form-control" placeholder="Password" />
                    </div>

                    <div class="form-group mt sp30">
                        <button class="dvs-button dvs-button-primary">Log In to Administration</button>
                    </div>

                    <div class="form-group">
                        <a href="<?= URL::route('user-recover-password') ?>">Forgot Your Password?</a>
                    </div>
                <?= Form::close() ?>
            </div>
        </div>
    </div>
@stop