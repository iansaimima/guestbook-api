<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook API - Demo Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-light">
    <div class="container py-4">
        <!-- Header -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h1 class="display-5 fw-bold mb-2"><i class="bi bi-book"></i> Guestbook API Demo</h1>
                <p class="text-muted">Testing API endpoints dengan jQuery Client</p>

                <!-- API Configuration -->
                <div class="mt-4 p-4 bg-primary bg-opacity-10 rounded">
                    <h5 class="fw-semibold text-primary mb-3"><i class="bi bi-gear"></i> API Configuration</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Base URL</label>
                            <input type="text" id="config-base-url" value="https://api.gb.gutsylab.com/api"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">API Key</label>
                            <input type="text" id="config-api-key" value="ly1VskisCUDJyFeIIls9ndseQPDfVslk"
                                   class="form-control">
                        </div>
                    </div>
                    <button id="btn-save-config" class="btn btn-primary mt-3">
                        <i class="bi bi-save"></i> Save Configuration
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Column: Forms -->
            <div class="col-lg-6">
                <div class="d-flex flex-column gap-4">
                    <!-- Create Form -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Create Guestbook Entry</h5>
                        </div>
                        <div class="card-body">
                            <form id="form-create">
                                <div class="mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" id="input-name" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email *</label>
                                    <input type="email" id="input-email" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" id="input-phone" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Organization</label>
                                    <input type="text" id="input-organization" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Purpose *</label>
                                    <input type="text" id="input-purpose" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea id="input-message" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Visit Date *</label>
                                    <input type="date" id="input-visit-date" required class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="bi bi-check-circle"></i> Create Entry
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Get by ID -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="bi bi-search"></i> Get Entry by ID</h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="number" id="input-guestbook-id" placeholder="Enter ID" class="form-control">
                                <button id="btn-load-detail" class="btn btn-info text-white">
                                    <i class="bi bi-search"></i> Load
                                </button>
                            </div>
                            <div id="detail-result" class="d-none">
                                <div class="p-3 bg-light rounded">
                                    <pre id="detail-json" class="mb-0 small text-dark" style="max-height: 300px; overflow: auto;"></pre>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Form -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Update Guestbook Entry</h5>
                        </div>
                        <div class="card-body">
                            <form id="form-update">
                                <div class="mb-3">
                                    <label class="form-label">ID *</label>
                                    <input type="number" id="update-id" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" id="update-name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" id="update-email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea id="update-message" rows="3" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-warning w-100">
                                    <i class="bi bi-arrow-repeat"></i> Update Entry
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: List -->
            <div class="col-lg-6">
                <div class="d-flex flex-column gap-4">
                    <!-- All Entries -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="bi bi-list-ul"></i> All Guestbook Entries</h5>
                            <button id="btn-load-all" class="btn btn-light btn-sm">
                                <i class="bi bi-arrow-clockwise"></i> Refresh
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="loading" class="d-none text-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-2 text-muted">Loading...</p>
                            </div>

                            <div id="guestbook-list">
                                <!-- Guestbook entries will be loaded here -->
                            </div>

                            <div id="no-data" class="d-none text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1"></i>
                                <p>No guestbook entries found. Create one to get started!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Console Log -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="bi bi-terminal"></i> Console Log</h5>
                            <button id="btn-clear-log" class="btn btn-secondary btn-sm">
                                <i class="bi bi-trash"></i> Clear
                            </button>
                        </div>
                        <div class="card-body p-0">
                            <div id="console-log" class="bg-dark text-success p-3 font-monospace small" style="height: 300px; overflow-y: auto;">
                                <div class="text-muted">Console output will appear here...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include client.js -->
    <script src="/client.js"></script>

    <!-- Custom implementation -->
    <script>
        $(document).ready(function() {
            // Set today's date as default
            $('#input-visit-date').val(new Date().toISOString().split('T')[0]);

            // Save configuration
            $('#btn-save-config').off('click').on('click', function() {
                const baseURL = $('#config-base-url').val();
                const apiKey = $('#config-api-key').val();

                GuestbookAPI.setBaseURL(baseURL);
                GuestbookAPI.setApiKey(apiKey);

                logToConsole('Configuration updated', { baseURL, apiKey });
                alert('Configuration saved!');
                $('#btn-load-all').click();
            });

            // Enhanced logging function
            function logToConsole(message, data = null) {
                const timestamp = new Date().toLocaleTimeString();
                let logHTML = `<div class="mb-2">
                    <span class="text-info">[${timestamp}]</span>
                    <span class="text-warning">${message}</span>`;

                if (data) {
                    logHTML += `<pre class="mt-1 text-light small">${JSON.stringify(data, null, 2)}</pre>`;
                }

                logHTML += '</div>';

                $('#console-log').prepend(logHTML);
            }

            // Clear console log
            $('#btn-clear-log').off('click').on('click', function() {
                $('#console-log').html('<div class="text-muted">Console cleared...</div>');
            });

            // Override console.log for demo
            const originalLog = console.log;
            console.log = function() {
                originalLog.apply(console, arguments);
            };

            // Load all guestbooks with enhanced display
            $('#btn-load-all').off('click').on('click', function() {
                $('#loading').removeClass('d-none');
                $('#guestbook-list').addClass('d-none');
                $('#no-data').addClass('d-none');

                logToConsole('Fetching all guestbooks...');

                GuestbookAPI.getAll(function(error, response) {
                    $('#loading').addClass('d-none');

                    if (error) {
                        logToConsole('Error fetching guestbooks', error);
                        alert('Error: ' + (error.message || 'Failed to fetch guestbooks'));
                        $('#no-data').removeClass('d-none');
                    } else {
                        logToConsole('Success: Fetched ' + response.data.length + ' entries', response);

                        if (response.data.length === 0) {
                            $('#no-data').removeClass('d-none');
                        } else {
                            displayGuestbooks(response.data);
                            $('#guestbook-list').removeClass('d-none');
                        }
                    }
                });
            });

            // Display guestbooks in list
            function displayGuestbooks(guestbooks) {
                let html = '<div class="d-flex flex-column gap-3">';
                guestbooks.forEach(function(item) {
                    html += `
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <h6 class="fw-bold mb-1">${item.name}</h6>
                                        <p class="text-muted small mb-0"><i class="bi bi-envelope"></i> ${item.email}</p>
                                    </div>
                                    <span class="badge bg-secondary">#${item.id}</span>
                                </div>
                                ${item.organization ? `<p class="small mb-1"><strong><i class="bi bi-building"></i> Org:</strong> ${item.organization}</p>` : ''}
                                ${item.phone ? `<p class="small mb-1"><strong><i class="bi bi-telephone"></i> Phone:</strong> ${item.phone}</p>` : ''}
                                <p class="small mb-1"><strong><i class="bi bi-briefcase"></i> Purpose:</strong> ${item.purpose}</p>
                                ${item.message ? `<p class="small text-muted mb-2">${item.message}</p>` : ''}
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                    <span class="small text-muted"><i class="bi bi-calendar-check"></i> ${item.visit_date}</span>
                                    <button class="btn btn-danger btn-sm btn-delete" data-id="${item.id}">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                html += '</div>';
                $('#guestbook-list').html(html);
            }

            // Load detail by ID
            $('#btn-load-detail').off('click').on('click', function() {
                const id = $('#input-guestbook-id').val();
                if (!id) {
                    alert('Please enter a guestbook ID');
                    return;
                }

                logToConsole('Fetching guestbook ID: ' + id);

                GuestbookAPI.getById(id, function(error, response) {
                    if (error) {
                        logToConsole('Error fetching guestbook', error);
                        alert('Error: ' + (error.message || 'Guestbook not found'));
                        $('#detail-result').addClass('d-none');
                    } else {
                        logToConsole('Success: Fetched guestbook', response.data);
                        $('#detail-json').text(JSON.stringify(response.data, null, 2));
                        $('#detail-result').removeClass('d-none');
                    }
                });
            });

            // Create form submission
            $('#form-create').off('submit').on('submit', function(e) {
                e.preventDefault();

                const formData = {
                    name: $('#input-name').val(),
                    email: $('#input-email').val(),
                    phone: $('#input-phone').val() || undefined,
                    organization: $('#input-organization').val() || undefined,
                    purpose: $('#input-purpose').val(),
                    message: $('#input-message').val() || undefined,
                    visit_date: $('#input-visit-date').val()
                };

                logToConsole('Creating new guestbook entry...', formData);

                GuestbookAPI.create(formData, function(error, response) {
                    if (error) {
                        logToConsole('Error creating guestbook', error);
                        alert('Error: ' + (error.message || 'Failed to create'));
                        if (error.errors) {
                            $.each(error.errors, function(field, messages) {
                                logToConsole('Validation error in ' + field, messages);
                            });
                        }
                    } else {
                        logToConsole('Success: Created guestbook', response.data);
                        alert('Guestbook created successfully!');
                        $('#form-create')[0].reset();
                        $('#input-visit-date').val(new Date().toISOString().split('T')[0]);
                        $('#btn-load-all').click(); // Refresh list
                    }
                });
            });

            // Update form submission
            $('#form-update').off('submit').on('submit', function(e) {
                e.preventDefault();

                const id = $('#update-id').val();
                const formData = {};

                if ($('#update-name').val()) formData.name = $('#update-name').val();
                if ($('#update-email').val()) formData.email = $('#update-email').val();
                if ($('#update-message').val()) formData.message = $('#update-message').val();

                if (Object.keys(formData).length === 0) {
                    alert('Please fill at least one field to update');
                    return;
                }

                logToConsole('Updating guestbook ID: ' + id, formData);

                GuestbookAPI.update(id, formData, function(error, response) {
                    if (error) {
                        logToConsole('Error updating guestbook', error);
                        alert('Error: ' + (error.message || 'Failed to update'));
                    } else {
                        logToConsole('Success: Updated guestbook', response.data);
                        alert('Guestbook updated successfully!');
                        $('#form-update')[0].reset();
                        $('#btn-load-all').click(); // Refresh list
                    }
                });
            });

            // Delete handler - using event delegation
            $(document).off('click', '.btn-delete').on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                if (confirm('Are you sure you want to delete this entry?')) {
                    logToConsole('Deleting guestbook ID: ' + id);

                    GuestbookAPI.delete(id, function(error, response) {
                        if (error) {
                            logToConsole('Error deleting guestbook', error);
                            alert('Error: ' + (error.message || 'Failed to delete'));
                        } else {
                            logToConsole('Success: Deleted guestbook ID: ' + id);
                            alert('Guestbook deleted successfully!');
                            $('#btn-load-all').click(); // Refresh list
                        }
                    });
                }
            });

            // Auto-load guestbooks on page load
            $('#btn-load-all').click();

            logToConsole('Guestbook API Demo loaded successfully!');
        });
    </script>
</body>
</html>
