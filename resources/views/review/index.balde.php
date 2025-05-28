@extends('da')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Đánh giá của tôi</h4>
                </div>
                
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('user.reviews.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Thêm đánh giá mới
                        </a>
                    </div>
                    
                    @if($reviews->isEmpty())
                        <div class="alert alert-info">
                            Bạn chưa có đánh giá nào. Hãy thêm đánh giá đầu tiên!
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sách</th>
                                        <th>Đánh giá</th>
                                        <th>Bình luận</th>
                                        <th>Ngày</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->book->title }}</td>
                                        <td>
                                            <div class="rating-display">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <span class="star filled">★</span>
                                                    @else
                                                        <span class="star">☆</span>
                                                    @endif
                                                @endfor
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($review->comment, 50) }}</td>
                                        <td>{{ $review->date_review->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="{{ route('user.reviews.show', $review->id) }}" 
                                               class="btn btn-sm btn-info">
                                               <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-3">
                            {{ $reviews->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .rating-display {
        display: flex;
    }
    .star {
        color: #ccc;
        font-size: 18px;
    }
    .star.filled {
        color: gold;
    }
</style>
@endsection