<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @php
        if ($isEmpty) {
            $name = '';
            $gender = '';
            $genderName = 'Pilih Jenis Kelamin';
            $roleName = 'Pilih Role';
            $role = '';
            $parent = '';
            $parentName = 'Pilih Orang Tua';
            $buttonName = 'Tambah';
            $action = '/store';
        } else {
            $name = $data->name;
            $gender = $data->gender;
            $genderName = $data->gender;
            $role = $data->role;
            if ($role == 'child') {
                $roleName = 'Anak Budi';
            } else {
                $roleName = 'Cucu Budi';
            }
            $parent = $data->child_of;
            $parentName = $data->child_of;
            $buttonName = 'Edit';
            $action = '/update/' . $data->id;
        }
    @endphp
    <div>
        <form action={{ $action }} method="post">
            @csrf
            <div class="row" style="margin: 15px">
                <div class="col">
                    <label for="">Nama</label>
                </div>
                <div class="col">
                    <input type="text" name="name" placeholder="Masukkan Nama" value="{{ $name }}"
                        required>
                </div>
            </div>
            <div class="row" style="margin: 15px">
                <div class="col">
                    <label for="">Jenis Kelamin</label>
                </div>
                <div class="col">
                    <select name="gender" id="" required>
                        <option value="{{ $gender }}" selected hidden>{{ $genderName }}</option>
                        <option value="Laki laki">Laki laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin: 15px">
                <div class="col">
                    <label for="">Role</label>
                </div>
                <div class="col">
                    <select name="role" id="role" required>
                        <option value="{{ $role }}" selected hidden>{{ $roleName }}</option>
                        <option value="child">Anak Budi</option>
                        <option value="grandchild">Cucu Budi</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin: 15px">
                <div class="col">
                    <label for="">Orang Tua</label>
                </div>
                <div class="col">
                    <select name="child_of" id="child_of" required>
                        <option id="default_option" value='{{ $parent }}' selected hidden>{{ $parentName }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin: 15px">
                <button type="submit">{{ $buttonName }}</button>
            </div>
        </form>
    </div>

    <script>
        var roleSelect = document.getElementById("role");
        var childOfSelect = document.getElementById("child_of");
        var datas = {!! json_encode($datas->toArray()) !!};
        console.log(datas)

        roleSelect.addEventListener("change", function() {
            var selectedRole = this.value;
            childOfSelect.innerHTML =
                "<option value='' selected hidden>Pilih Orang Tua</option>";

            if (selectedRole === "child") {
                for (var i = 0; i < datas.length; i++) {
                    if (datas[i].role === "") {
                        var option = document.createElement("option");
                        option.value = datas[i].name;
                        option.text = datas[i].name;
                        childOfSelect.appendChild(option);
                    }
                }
            } else if (selectedRole === "grandchild") {
                for (var i = 0; i < datas.length; i++) {
                    if (datas[i].role === "child") {
                        var option = document.createElement("option");
                        option.value = datas[i].name;
                        option.text = datas[i].name;
                        childOfSelect.appendChild(option);
                    }
                }
            }
        });
    </script>

</body>

</html>
