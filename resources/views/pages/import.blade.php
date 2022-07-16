@extends('layouts.master')

@section('content')
<div class="container  w-4/5 mt-4  mx-auto px-2">
    <div class="my-4">
        @if ($errors->any() && $errors->has('file'))
            {!! $errors->first(
                'file',
                '<p id="cv_name_help_block" class="text-red-800 my-1">
                            :message</p>',
            ) !!}
        @endif
        @include('shared._flash')
        @include('shared.error')
    </div>

    <div class="my-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="inline-flex bg-red-900 px-2 py-1 text-[#fff] mx-2">
            <svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none"
                viewBox="0 0 24 24">
                <path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
            </svg>
            Back Home
        </a>
    </div>

    <div class="lg:mt-0 rounded shadow bg-white  flex justify-center">
        <div class="flex w-full h-64 items-center justify-center bg-grey-lighter">
            <form action="{{ route('data.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label
                    class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Select a file</span>
                    <input type='file' name="file" class="hidden"
                        accept="text/plain, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                        required />
                </label>

                <button class="bg-green-400 px-4 py-2 rounded my-4 mx-16 text-white ">Submit</button>

            </form>
        </div>

    </div>


</div>
@endsection