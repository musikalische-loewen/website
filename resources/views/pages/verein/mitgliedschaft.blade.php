@extends('layout.main')

@section('title', 'Mitgliedschaft')
@section('image', asset('images/archive/large/pexels-pixabay-534283.jpg'))
@section('abstract')
    Möchten Sie aktives oder passives Mitglied in unserem Verein werden? Dann können sie uns gerne <a class="text-white" href="{{ url('kontakt') }}">kontakieren</a>,eine unserer <a class="text-white" href="{{ url('orchester/haupt') }}">Proben</a> besuchen oder das Mitgliedschaftsformular unten ausfüllen. Wir freuen uns auf Sie!
@endsection

@section('main')
    <div class="container my-5">
        @if(session('success'))
            <div class="card shadow-sm bg-success text-white mt-0 mb-4 py-0">
                <div class="card-body">
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
            </div>
        @endif
        <div class="card shadow-sm my-0 py-0">
            <form method="post" action="{{ route('forms.membership') }}" >
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        Hiermit erkläre ich meinen Eintritt in den {{ config('app.name_full') }} als
                        <select name="type" id="type" class="form-select w-auto d-inline" required>
                            <option value="aktiv" @if(old('type')=='aktiv') selected @endif>aktives</option>
                            <option value="passiv" @if(old('type')=='passiv') selected @endif>passives</option>
                        </select>
                        <label for="type" class="d-none">Mitgliedschaftstyp</label>
                        Mitglied mit Wirkung vom <input type="date" class="form-control w-auto d-inline" name="start" id="start" value="{{ old('date', date('Y-m-d')) }}" required><label for="start" class="d-none">Eintrittsdatum</label>.
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" placeholder="Max" value="{{ old('first_name') }}" required>
                                <label for="first_name">Vorname</label>
                                @include('layout.error', ['name' => 'first_name'])
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"  id="last_name" placeholder="Mustermann" value="{{ old('last_name') }}" required>
                                <label for="last_name">Nachname</label>
                                @include('layout.error', ['name' => 'last_name'])
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="text" class="form-control @error('street') is-invalid @enderror" name="street" id="street" placeholder="Musterstraße" value="{{ old('street') }}" required>
                                <label for="street">Straße</label>
                                @include('layout.error', ['name' => 'street'])
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="number" class="form-control @error('zip') is-invalid @enderror" name="zip"  id="zip" placeholder="56412" value="{{ old('zip') }}" required min="10000" max="99999">
                                <label for="zip">PLZ</label>
                                @include('layout.error', ['name' => 'zip'])
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"  id="city" placeholder="Nentershausen" value="{{ old('city') }}" required>
                                <label for="city">Ort</label>
                                @include('layout.error', ['name' => 'city'])
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="max.mustermann@example.com" value="{{ old('email') }}" required>
                                <label for="email">E-Mail</label>
                                @include('layout.error', ['name' => 'email'])
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="064851234" value="{{ old('phone') }}" required>
                                <label for="phone">Telefonnummer</label>
                                @include('layout.error', ['name' => 'phone'])
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="text" class="form-control @error('instrument') is-invalid @enderror" name="instrument" id="instrument" placeholder="Trompete" value="{{ old('instrument') }}">
                                <label for="instrument">Instrument (optional)</label>
                                @include('layout.error', ['name' => 'instrument'])
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday"  id="birthday" placeholder="{{ date('Y-m-d') }}" value="{{ old('birthday') }}" required>
                                <label for="birthday">Geburtstag</label>
                                @include('layout.error', ['name' => 'birthday'])
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="date" class="form-control @error('anniversary') is-invalid @enderror" name="anniversary"  id="anniversary" placeholder="{{ date('Y-m-d') }}" value="{{ old('anniversary') }}">
                                <label for="anniversary">Hochzeitstag (optional)</label>
                                @include('layout.error', ['name' => 'anniversary'])
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        Gleichzeitig ermächtige ich den {{ config('app.name_full') }} bis aus Widerruf den Jahresbeitrag von meinem nachstehenden Bankkonto per Einzugsermächtigung abzubuchen.<br>
                        Der Jahresbeitrag beträgt für Jugendliche 9,00 Euro und für Erwachsene 18,00 Euro.
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="text" class="form-control @error('iban') is-invalid @enderror" name="iban" id="iban" placeholder="DE..." value="{{ old('iban') }}" required>
                                <label for="iban">IBAN</label>
                                @include('layout.error', ['name' => 'iban'])
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="text" class="form-control @error('bic') is-invalid @enderror" name="bic" id="bic" placeholder="NASS..." value="{{ old('bic') }}" required>
                                <label for="bic">BIC</label>
                                @include('layout.error', ['name' => 'bic'])
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating has-validation">
                                <input type="text" class="form-control @error('bank_account_owner') is-invalid @enderror" name="bank_account_owner" id="bank_account_owner" placeholder="Max Mustermann" value="{{ old('bank_account_owner') }}" required>
                                <label for="bank_account_owner">Kontoinhaber</label>
                                @include('layout.error', ['name' => 'bank_account_owner'])
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        Ich habe die <a href="#">Datenschutzerklärung</a> gelesen und bin mit deren Geltung einverstanden.<br>
                        Ebenso erkenne ich die <a href="#">Satzung</a> als bindend an.
                    </div>

                    <button type="submit" class="btn btn-primary btn-round btn-block">Mitgliedschaftsformular absenden</button>
                </div>
            </form>
        </div>
    </div>
@endsection
