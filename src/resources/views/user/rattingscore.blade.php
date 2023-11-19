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
                                    <p><small>Bước {{ $key + 1 }}</small></p>
                                </div>
                            @else
                                <div class="process-step">
                                    <button onclick="openTab('{{ $key }}')" type="button"
                                        class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i
                                            class="fa fa-check fa-3x"></i></button>
                                    <p><small>Bước cuối</small></p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <form action="update-user-ratting/{{ $trans->id }}" method="post" enctype="multipart/form-data">
            @foreach ($parents as $key => $parent)
                @csrf
                @method('put')
                <div id="{{ $key }}" class="row tab-content">
                    <input style="display: none;" type="text" class="form-control border-0 py-3"
                        name="self_score_{{ $parent->id }}" value="{{ $parent->self_score }}" placeholder="0">
                    <input style="display: none;" type="text" class="form-control border-0 py-3"
                        name="class_score_{{ $parent->id }}" value="{{ $parent->class_score }}" placeholder="0">
                    <div class="col-12">
                        <div class="card">
                            <link rel="stylesheet"
                                href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                            <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                                <h4>{{ $parent->name }} </h4>
                                <h4 id="max_{{ $parent->id }}" style="font-style: italic; color:gray"> Tối đa: {{ $parent->max_score }} điểm </h4>
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
                                                    @if ($child_parent->parent_criteria_id == $parent->criteria_db_id)
                                                        <tr>
                                                            <td style="padding-top: 25px">{{ $child_parent->name }}:</td>
                                                            <td id="max_{{ $child_parent->id }}" style="padding-top: 25px">
                                                                {{ $child_parent->max_score }}</td>
                                                            <td><input id="self_{{ $child_parent->id }}" type="number"
                                                                    class="self_{{ $parent->id }} form-control border-0 py-3"
                                                                    name="self_score_{{ $child_parent->id }}"
                                                                    value="{{ $child_parent->self_score }}"
                                                                    onblur="countSumPoint('self', {{ $child_parent->id }}, {{ $parent->id }}); countPoint('self', {{ $child_parent->id }}, {{ $parent->id }})"
                                                                    placeholder="0"></td>
                                                            <td><input id="class_{{ $child_parent->id }}" type="number"
                                                                    class="class_{{ $parent->id }} form-control border-0 py-3"
                                                                    name="class_score_{{ $child_parent->id }}"
                                                                    value="{{ $child_parent->class_score }}"
                                                                    onblur="countSumPoint('class', {{ $child_parent->id }}, {{ $parent->id }}); countPoint('class', {{ $child_parent->id }}, {{ $parent->id }})"
                                                                    placeholder="0"></td>
                                                            @if ($child_parent->note == '')
                                                                <td style="padding-top: 25px">Sinh viên tự đánh giá</td>
                                                            @else
                                                                <td style="padding-top: 25px">{{ $child_parent->note }}
                                                                </td>
                                                            @endif
                                                        </tr>
                                                        @foreach ($childs as $child)
                                                            @if ($child->parent_criteria_id == $child_parent->criteria_db_id)
                                                                <tr>
                                                                    <td
                                                                        style="font-style: italic; padding-left: 30px; padding-top: 25px">
                                                                        {{ $child->name }}</td>
                                                                    <td id="max_{{ $child->id }}"
                                                                        style="padding-top: 25px">{{ $child->max_score }}
                                                                    </td>
                                                                    <td><input type="number" id="self_{{ $child->id }}"
                                                                            class="self_{{ $child_parent->id }} form-control border-0 py-3"
                                                                            name="self_score_{{ $child->id }}"
                                                                            value="{{ $child->self_score }}"
                                                                            onblur="countSumPoint('self', {{ $child_parent->id }}, {{ $parent->id }}, {{ $child->id }}); countPoint('self', {{ $child->id }}, {{ $child_parent->id }})"
                                                                            placeholder="0"></td>
                                                                    <td><input type="number"
                                                                            id="class_{{ $child->id }}"
                                                                            class="class_{{ $child_parent->id }} form-control border-0 py-3"
                                                                            name="class_score_{{ $child->id }}"
                                                                            value="{{ $child->class_score }}"
                                                                            onblur="countSumPoint('class', {{ $child_parent->id }}, {{ $parent->id }}, {{ $child->id }}); countPoint('class', {{ $child->id }}, {{ $child_parent->id }})"
                                                                            placeholder="0"></td>
                                                                    @if ($child->note == '')
                                                                        <td style="padding-top: 25px">Sinh viên tự đánh giá
                                                                        </td>
                                                                    @else
                                                                        <td style="padding-top: 25px">{{ $child->note }}
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                <button style="background-color:#0d6efd; border: none;" href=""
                    class="btn btn-secondary text-white px-5 py-3 rounded-pill">Lưu và tiếp
                    tục</button>
            </div>
        </form>
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
        //ctiveTab.classList.add('active-tab');
    }

    function countPoint(type, idChild, idParent) {
        var id_child_score = type + "_" + idChild;
        var id_child_max = "max_" + idChild;
        var id_parent_score = idParent;
        var id_parent_max = "max_" + idParent;
        var parent_score = document.getElementById(id_parent_score);
        var parent_max = document.getElementById(id_parent_max).innerHTML;
        var child_score = document.getElementById(id_child_score);
        var child_max = document.getElementById(id_child_max).innerHTML;
        if (parseInt(child_score.value) > parseInt(child_max)) {
            alert("Không được vượt quá điểm giới hạn !")
            child_score.value = 0
        } else {
            var childs = document.getElementsByClassName(type + "_" + idParent);
            var parent = document.getElementById(type + "_" + idParent);
            sum = 0;
            for (let i = 0; i < childs.length; i++) {
                sum += parseInt(childs[i].value);
                if (sum > parseInt(parent_max)) {
                    alert("Không được vượt quá điểm giới hạn !")
                    sum = parseInt(childs[i].value);
                    child_score.value = 0
                    break;
                }
            }
            parent.value = sum;
        }
    }
    function countSumPoint(type, idChild, idParent, idChild_2) {
        var id_child_score = type + "_" + idChild_2;
        var child_score = document.getElementById(id_child_score);
        var id_parent_max = "max_" + idParent;
        var parent_max = document.getElementById(id_parent_max).innerHTML;
        var childs = document.getElementsByClassName(type + "_" + idParent);
        sum = 0;
        for (let i = 0; i < childs.length; i++) {
                sum += parseInt(childs[i].value);
                if (sum > parseInt(parent_max)) {
                    alert("Không được vượt quá điểm giới hạn !")
                    child_score.value = 0
                    break;
                }
            }
    }
</script>