

@extends('layouts.admin')

@section('content')


<!-- -------------------------------------- -->
      <div class="container">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Name</th>
                    <th class="product-name">E-Mail</th>
                    <th class="product-price">Subject</th>
                    <th class="product-quantity">Message</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                  <tr>
                    <td class="product-thumbnail row-2">
                     {{$message->name}}
                    </td>
                    <td class="product-name row-4">
                      <h2 class="h5 text-black"> {{$message->email}}</h2>
                    </td>
                    <td>
                    {{$message->subject}}</td>
                    <td class="product-name row-5">
                    {{$message->message}}
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
<!-- --------------- -->
@endsection
