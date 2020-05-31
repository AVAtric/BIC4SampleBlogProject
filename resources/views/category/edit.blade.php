@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <category-form :is-editable="true" :current-category="{{ $category }}"></category-form>
    </section>
@endsection
