    @extends('site.template')
    @section('title', 'Resistrar-se')

    @section('content')
        <div class="row">
            <div class="col-md-8">
                <div class="img-login"></div>
            </div>
            <div class="col-md-4 my-0">
                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Resistrar-se</h5>
                        </div>

                        <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" id="name" required>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>


                            <div class="col-12">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" name="telefone" value="{{ old('telefone') }}"
                                    class="form-control @error('telefone') is-invalid @enderror" id="telefone" required>
                                @if ($errors->has('telefone'))
                                    <div class="invalid-feedback">{{ $errors->first('telefone') }}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" id="email" required>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Senha</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" name="terms" type="checkbox"
                                        id="terms" value="1" required>
                                    <label class="form-check-label" for="terms">Concordo e aceito os <a
                                            href="#">termos e condições</a></label>
                                    @if ($errors->has('terms'))
                                        <div class="invalid-feedback">{{ $errors->first('terms') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Criar a conta</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">já tem uma conta? <a href="{{ route('login') }}">Conecte-se</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
