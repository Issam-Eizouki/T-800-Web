<div style="width: 100%; background: #f6f7f9; padding: 50px 20px; font-family: Arial, sans-serif">
    <div style="max-width: 600px; margin: 0px auto; font-size: 14px">
        <div style="padding: 40px 30px; background: #fff; border: 1px solid #00000020; border-radius: 6px; box-shadow: 0 4px 10px 0 rgba(20, 19, 34, 0.03), 0 0 10px 0 rgba(20, 19, 34, 0.02);">
            <table style="border-collapse: collapse; border: 0; width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 100%; text-align: center">
                            <h1 style="font-family: Arial, sans-serif; color: #46474f; margin: 0;
                                line-height: 1.2; font-weight: bold; font-size: 22px">City Tours</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-family: Arial, sans-serif; color: #73747c; font-size: 14px;
                                margin: 0 0 20px 0; text-align: left">You have requested to reset your forgotten password. Please press the button below to set up a new password.</p>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('password.reset.view', ['token' => $token]) }}" target="_blank"
                            style="background: #4b7cf3; text-decoration: none; display: block;
                                margin: 0 auto 20px auto; border-radius: 6px; font-family: Arial, sans-serif;
                                padding: 14px 25px; font-size: 14px; color: #fff; text-align: center">Reset Password</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-family: Arial, sans-serif; color: #73747c; font-size: 14px;
                                margin: 0 0 20px 0; text-align: left">
                                In case the install button does not work, please copy the link below into your browser.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="display: block; margin: 0 auto 20px auto; background: #f6f7f9; padding: 14px 20px;
                                border-radius: 3px; font-family: Arial, sans-serif; font-size: 14px; color: #4b7cf3;
                                font-weight: bold; text-decoration: none; text-align: left; word-wrap: break-all">
                                <a href="{{ route('password.reset.view',  ['token' => $token]) }}" target="_blank">
                                {!! route('password.reset', ['token' => $token]) !!}</a>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="text-align: center; font-size: 12px; color: #a09bb9; margin-top: 20px">
            <p>City Tours 2023</p>
        </div>
    </div>
</div>
