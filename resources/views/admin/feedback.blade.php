@extends('admin.adminlayout')


@section('content')
<div class="col-sm-9 mt-5">
    <!-- table -->
     <p class="bg-dark text-white p-2">
        List of Feedback
     </p>

     <table class="table">
        <thead>
            <tr>
                <th scope="col">Feedback ID</th>
                <th scope="col">Content</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr><th scope="row">1</th>
                <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, nemo? Suscipit tenetur voluptates omnis sed obcaecati facere accusantium molestiae fugit maiores asperiores tempore explicabo deleniti, reprehenderit repudiandae commodi ad et.</td>
                <td>21</td>
             
                <td>
                <form action="" method="POST" class="d-inline"> 
                  <input type="hidden" name="id" value=''>
                  <button
                    type="submit"
                    class="btn btn-secondary"
                    name="delete"
                    value="Delete">
                       <i class="far fa-trash-alt"></i>  
                    </button>
                    </form>
                    </td>
                </tr>
        </tbody>
     </table>
</div>



<div>
    <a href="#" class="btn btn-danger box">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
    
@endsection