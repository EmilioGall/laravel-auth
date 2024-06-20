@extends('layouts.admin')


@section('content')
   <div class="container">

      <div class="row justify-content-center">

         <div class="col-md-8 mt-4">

            <div class="card">

               {{-- Header --}}
               <div class="card-header d-flex justify-content-between">

                  {{-- Project Table Title --}}
                  <div class="col-9 fw-bold fs-3 text-primary">

                     {{ __('Projects') }}

                  </div>

                  {{-- Button to Create New Project --}}
                  <div class="col-3 d-flex justify-content-end align-items-end">

                     <a type="button" class="btn btn-primary" href="{{ route('admin.projects.create') }}">

                        <i class="fa-solid fa-plus me-1"></i> Add New Project

                     </a>

                  </div>

               </div>

               <div class="card-body">

                  <table class="table">

                     <thead>

                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Description</th>
                           <th scope="col">Actions</th>
                        </tr>

                     </thead>

                     <tbody>

                        @foreach ($projectsArray as $project)
                           <tr>
                              <th scope="row">
                                 <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">{{ $project['slug'] }}</a>
                              </th>
                              <td>{{ $project['name'] }}</td>
                              <td>{{ substr($project['description'], 0, 20) }}...</td>
                              <td>

                                 {{-- Modify Button --}}
                                 <a type="button" class="btn btn-outline-primary"
                                    href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">

                                    <i class="fa-regular fa-pen-to-square"></i>

                                 </a>

                                 {{-- Delete Button --}}
                                 <a type="button" class="btn btn-outline-danger"
                                    href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">

                                    <i class="fa-regular fa-trash-can"></i>

                                 </a>

                              </td>
                           </tr>
                        @endforeach

                     </tbody>

                  </table>

               </div>

            </div>

         </div>

      </div>

   </div>
@endsection
