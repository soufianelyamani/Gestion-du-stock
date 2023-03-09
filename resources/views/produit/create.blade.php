@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('produit.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>{{ __('liblle') }}</label>
                <div>
                    <input type="text" name="liblle" value="{{ old('liblle') }}"
                        class="form-control mb-1 @error('liblle') is-invalid @enderror">
                </div>
                @error('liblle')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <label>{{ __('prix') }}</label>
                <div>
                    <input type="text" name="prix" value="{{ old('prix') }}"
                        class="form-control mb-1 @error('prix') is-invalid @enderror">
                </div>
                @error('prix')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('type produit') }}</label>
            <div>
                <select name="type_produit_id" id=""  class="form-control mb-1 @error('type_produit_id') is-invalid @enderror">
                    @foreach ($produit as $p)
                        <option value="{{ $p->id }}">
                        {{ $p->liblle }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('type_produit_id')
            <div class="alert alert-danger text-danger">{{ $message }}</div>
            @enderror
          
        </div>

        <div>
            <label>{{ __('qtStock') }}</label>
            <div>
                <input type="text" name="qtStock" value="{{ old('qtStock') }}"
                class="form-control mb-1 @error('qtStock') is-invalid @enderror">
            </div>
            @error('qtStock')
            <div class="alert alert-danger text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>{{ __('image') }}</label>
            <div>
                <input type="file" name="image" value="{{ old('image')}}">
                </div>
                @error('image')
                <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('description') }}</label>
                <div>
                    {{-- <input type="text" name="description" value="{{ old('description') }}"
                        class="form-control mb-1 @error('description') is-invalid @enderror"> --}}
                        <textarea name="description" id="description" cols="60" rows="2"></textarea>
                </div>
                @error('description')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button class="btn btn-success mt-1" type="submit">Create</button>
        </form>
    </div>
    @endsection
    