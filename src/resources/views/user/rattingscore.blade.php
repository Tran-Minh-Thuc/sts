@extends('layouts.layoutuser')
@section('content')
    @if ($msg)
        <div style="text-align: center">{{ $msg }}</div>
    @else
        <div class="container">
            <div class="row">
                <div class="process">
                    <div class="process-row nav nav-tabs">
                        @foreach ($parents as $key => $parent)
                            @if ($parent_rows - 1 != $key)
                                <div class="process-step">
                                    <button onclick="openTab('{{ $key }}')" type="button"
                                        class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i
                                            class="la la-angle-double-right fa-3x"></i></button>
                                    <p><small>{{ $parent->name }}</small></p>
                                </div>
                            @else
                                <div class="process-step">
                                    <button onclick="openTab('{{ $key }}')" type="button"
                                        class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i
                                            class="fa fa-check fa-3x"></i></button>
                                    <p><small>{{ $parent->name }}</small></p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @foreach ($parents as $key => $parent)
            <div id="{{ $key }}" class="row tab-content">
                <div class="col-12">
                    <div class="card">
                        <link rel="stylesheet"
                            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                        <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                            <h4>{{ $parent->name }}</h4>
                        </div>
                        <div class="card-content collapse show" id="menu1">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nội Dung Đánh Giá</th>
                                                <th>Điểm tối đa</th>
                                                <th>Điểm Sinh Viên Tự Đánh Giá</th>
                                                <th>Điểm lớp đánh giá</th>
                                                <th>Ghi Chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($child_parents as $child_parent)
                                                @if ($child_parent->parent_criteria_id == $parent->id)
                                                    <tr>
                                                        <td style="padding-top: 25px">{{ $child_parent->name }}:</td>
                                                        <td><input type="text" class="form-control border-0 py-3"
                                                                value="{{ $child_parent->max_score }}" placeholder="0"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control border-0 py-3"
                                                                value="{{ $child_parent->self_score }}" placeholder="0">
                                                        </td>
                                                        <td><input type="text" class="form-control border-0 py-3"
                                                                value="{{ $child_parent->class_score }}" placeholder="0">
                                                        </td>
                                                        <td><input type="text" class="form-control border-0 py-3"
                                                                value="{{ $child_parent->note }}"
                                                                placeholder="Sinh viên tự đánh giá" readonly></td>
                                                    </tr>
                                                    @foreach ($childs as $child)
                                                        @if ($child->parent_criteria_id == $child_parent->id)
                                                            <tr>
                                                                <td
                                                                    style="font-style: italic; padding-left: 30px; padding-top: 25px">
                                                                    {{ $child->name }}</td>
                                                                <td><input type="text" class="form-control border-0 py-3"
                                                                        value="{{ $child->max_score }}" placeholder="0"
                                                                        readonly></td>
                                                                <td><input type="text" class="form-control border-0 py-3"
                                                                        value="{{ $child->self_score }}" placeholder="0">
                                                                </td>
                                                                <td><input type="text" class="form-control border-0 py-3"
                                                                        value="{{ $child->class_score }}" placeholder="0">
                                                                </td>
                                                                <td><input type="text" class="form-control border-0 py-3"
                                                                        value="{{ $child->note }}"
                                                                        placeholder="Sinh viên tự đánh giá" readonly></td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="padding-top: 25px;" class="text-center mx-auto pb-5  "
                                        style="max-width: 600px;   ">
                                        <button style="background-color:#0d6efd; border: none;" href=""
                                            class="btn btn-secondary text-white px-5 py-3 rounded-pill">Lưu và tiếp
                                            tục</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
<script>
    function openTab(tabId) {
        // Hide all tab contents
        var tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(function(tabContent) {
            tabContent.classList.remove('active-content');
        });

        // Deactivate all tabs
        var tabs = document.querySelectorAll('.tab');
        tabs.forEach(function(tab) {
            tab.classList.remove('active-tab');
        });

        // Show the selected tab content
        document.getElementById(tabId).classList.add('active-content');

        // Activate the selected tab
        var activeTab = document.querySelector('.tab[data-tab="' + tabId + '"]');
        activeTab.classList.add('active-tab');
    }
</script>
