<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #666;
        }
        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group select {
            height: 40px;
        }
        .form-group textarea {
            height: 80px;
        }
        .form-group .error {
            color: red;
            font-size: 12px;
        }
        .form-group .note {
            font-size: 12px;
            color: #666;
        }
        .form-group .gender-inputs {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>{{$title}}</h2>
        <form action="{{$url}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" maxlength="60" value="{{($customer->name) ? $customer->name : old('name')}}">
                @error('name')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" maxlength="100" value="{{($customer->email) ? $customer->email : old('email')}}">
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <div class="gender-inputs">
                    <label for="male">
                        <input type="radio" id="male" name="gender" value="M" {{($customer->gender == 'M') ? 'checked' : ''}}> Male
                    </label>
                    <label for="female">
                        <input type="radio" id="female" name="gender" value="F" {{($customer->gender == 'F') ? 'checked' : ''}}> Female
                    </label>
                    <label for="other">
                        <input type="radio" id="other" name="gender" value="O" {{($customer->gender == 'O') ? 'checked' : ''}}> Other
                    </label>

                    @error('gender')
                         {{$message}}
                     @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address">{{($customer->address) ? $customer->address : old('address')}}</textarea>
                @error('address')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="state">state:</label>
                <input type="text" id="state" name="state" maxlength="60" value="{{($customer->state) ? $customer->state : old('state')}}">
                @error('state')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="country">country:</label>
                <input type="text" id="country" name="country" maxlength="60" value="{{($customer->country) ? $customer->country : old('country')}}">
                @error('country')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="{{($customer->dob) ? $customer->dob : old('dob')}}">
                @error('dob')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                @error('password')
                    {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="password_confirm">
                @error('password_confirm')
                    {{$message}}
                @enderror
            </div>
            {{-- <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Active" selected>Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div> --}}
            <div class="form-group">
                <label for="points">Points:</label>
                <input type="number" id="points" name="points" value="{{($customer->points) ? $customer->points : '0'}}" min="0">
                <span class="note">Enter points if applicable</span>

                @error('points')
                    {{$message}}
                @enderror
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
