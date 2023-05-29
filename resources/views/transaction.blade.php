@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="/transaction" method="POST">
                @csrf
                <div class="row my-2">
                    <div class="col-md-4">
                        Favoring Name:
                        <input type="text" name="recipient" class="form-control" list="recipients">
                        <datalist id="recipients">
                            @foreach (App\Models\Recipient::all() as $recipient)
                                <option value="{{ $recipient->name }}" onclick="console.log(this)">{{ $recipient->id }}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-md-4">
                        Project Name:
                        <input type="text" name="project" class="form-control" list="projects">
                        <datalist id="projects">
                            @foreach (App\Models\Project::all() as $project)
                                <option value="{{ $project->name }}"></option>
                            @endforeach
                        </datalist>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                        Payment Type:
                        <input type="text" name="type" class="form-control" list="types">
                        <datalist id="types">
                            <option value="Check"></option>
                            <option value="Cash"></option>
                            <option value="PO"></option>
                            <option value="Fund Transfer"></option>
                            <option value="RTGS"></option>
                        </datalist>
                    </div>
                    <div class="col-md-4">
                        Payment Identifier:
                        <input type="text" name="identifier" class="form-control">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                        Account:
                        <input type="text" name="account" class="form-control" list="accounts">
                        <datalist id="accounts">
                            @foreach (App\Models\BankAccount::all() as $account)
                                <option value="{{ $account->bank }} - {{ $account->account }}"></option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-md-4">
                        Amount:
                        <input type="number" name="amount" class="form-control">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-8">
                        Remarks:
                        <textarea name="remarks" class="form-control" cols="30" rows="3"></textarea>
                        <button class="btn btn-primary w-100 mt-3">Add transaction</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection