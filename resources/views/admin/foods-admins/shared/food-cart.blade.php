<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Foods</h5>
                <a  href="{{ route('adminFoods.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Foods</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">image</th>
                            <th scope="col">price</th>
                            <th scope="col">delete</th>
                            <th scope="col">show</th>
                        </tr>
                    </thead>
                    @forelse ($foods as $food)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $food->id }}</th>
                                <td>{{ $food->name }}</td>
                                <td><img src="{{ $food->getImageURL() }}" alt="image" style="width: 50px; height: 50px;"></td>
                                <td>{{ $food->price }}</td>
                                <td>
                                    <form method="post" action="{{ route('adminFoods.destroy', $food->id) }}">
                                        @csrf
                                        @method('delete')   
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @empty
                        <p class="text-center mt-3">No results has been found!</p>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>