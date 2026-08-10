@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">SMTP Settings</li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('admin.smtp-settings.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card mb-4">
                    <div class="card-header"><strong>SMTP Configuration</strong></div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mailer</label>
                                    <select name="mail_mailer" class="form-control">
                                        <option value="smtp" {{ ($smtp->mail_mailer ?? 'smtp') == 'smtp' ? 'selected' : '' }}>SMTP</option>
                                        <option value="sendmail" {{ ($smtp->mail_mailer ?? '') == 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Host</label>
                                    <input type="text" name="mail_host" class="form-control"
                                        value="{{ old('mail_host', $smtp->mail_host ?? '') }}" placeholder="smtp.gmail.com" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Port</label>
                                    <input type="text" name="mail_port" class="form-control"
                                        value="{{ old('mail_port', $smtp->mail_port ?? '587') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="mail_username" class="form-control"
                                        value="{{ old('mail_username', $smtp->mail_username ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="mail_password" class="form-control"
                                        placeholder="{{ !empty($smtp->mail_password) ? '••••••••  (leave blank to keep current)' : 'Enter password' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Encryption</label>
                                    <select name="mail_encryption" class="form-control">
                                        <option value="tls" {{ ($smtp->mail_encryption ?? 'tls') == 'tls' ? 'selected' : '' }}>TLS</option>
                                        <option value="ssl" {{ ($smtp->mail_encryption ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                        <option value="" {{ ($smtp->mail_encryption ?? '') == '' ? 'selected' : '' }}>None</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>From Address</label>
                                    <input type="email" name="mail_from_address" class="form-control"
                                        value="{{ old('mail_from_address', $smtp->mail_from_address ?? '') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>From Name</label>
                                    <input type="text" name="mail_from_name" class="form-control"
                                        value="{{ old('mail_from_name', $smtp->mail_from_name ?? config('app.name')) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label>Admin Enquiry Email <small class="text-muted">(all enquiry form notifications go here)</small></label>
                            <input type="email" name="admin_enquiry_email" class="form-control"
                                value="{{ old('admin_enquiry_email', $smtp->admin_enquiry_email ?? '') }}" required>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Settings
                </button>

            </form>

            <div class="card mt-4">
                <div class="card-header"><strong>Send Test Email</strong></div>
                <div class="card-body">
                    <form action="{{ route('admin.smtp-settings.test') }}" method="POST" class="form-inline">
                        @csrf
                        <input type="email" name="test_email" class="form-control mr-2" placeholder="you@example.com" required style="min-width:280px">
                        <button type="submit" class="btn btn-outline-dark">
                            <i class="fa fa-paper-plane"></i> Send Test Email
                        </button>
                    </form>
                    <small class="text-muted d-block mt-2">Save your SMTP settings above first, then send a test to confirm everything is configured correctly.</small>
                </div>
            </div>

        </div>

    </div>

</div>

@include('admin.footer')