<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #374151;
            margin: 35px;
            line-height: 1.5;
            background: #fff;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #6b7280;
        }

        .fw-bold {
            font-weight: bold;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .mt-40 {
            margin-top: 40px;
        }

        .company-header {
            border-bottom: 3px solid #2563EB;
            padding-bottom: 18px;
            margin-bottom: 30px;
        }

        .company-left {
            width: 60%;
            vertical-align: top;
        }

        .company-right {
            width: 40%;
            text-align: right;
            vertical-align: top;
        }

        .logo {
            width: 180px;
            margin-bottom: 15px;
        }

        .company-name {
            font-size: 28px;
            font-weight: bold;
            color: #111827;
        }

        .company-tagline {
            color: #2563EB;
            font-size: 12px;
            margin-top: 3px;
        }

        .company-info {
            margin-top: 12px;
            font-size: 11px;
            color: #6b7280;
            line-height: 1.7;
        }

        .invoice-title {
            font-size: 34px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 8px;
        }

        .invoice-number {
            font-size: 18px;
            color: #2563EB;
            font-weight: bold;
        }

        .status {
            display: inline-block;
            margin-top: 15px;
            padding: 6px 16px;
            border-radius: 18px;
            color: #fff;
            font-size: 11px;
            font-weight: bold;
            background: {{ $statusHexColor }};
        }

        .section-title {
            font-size: 11px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .card {
            border: 1px solid #E5E7EB;
            padding: 18px;
            border-radius: 6px;
        }

        .card table td {
            padding: 3px 0;
            vertical-align: top;
        }

        .info-label {
            width: 35%;
            color: #6b7280;
            font-size: 11px;
        }

        .info-value {
            font-weight: bold;
            color: #111827;
        }

        .bill-name {
            font-size: 16px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 6px;
        }

        .bill-company {
            color: #2563EB;
            margin-bottom: 8px;
        }

        .divider {
            height: 20px;
        }
    </style>

</head>

<body>

    <!-- ================= HEADER ================= -->

    <table class="company-header">

        <tr>

            <td class="company-left">

                <img src="{{ public_path('logo-dark.png') }}" class="logo">

                <div class="company-name">
                    FusionCentrix
                </div>

                <div class="company-tagline">
                    Building Modern Software Solutions<br>
                    Web Development • Mobile Apps • Digital Marketing • Branding & UI/UX Design
                </div>

                <div class="company-info">

                    Website :
                    https://fusioncentrix.com

                    <br>

                    Email :
                    info@fusioncentrix.com

                    <br>

                    Phone :
                    +91 82820 98384

                    <br>

                    Kolkata, India

                </div>

            </td>

            <td class="company-right">

                <div class="invoice-title">

                    INVOICE

                </div>

                <div class="invoice-number">

                    {{ $invoice->invoice_number }}

                </div>


            </td>

        </tr>

    </table>

    <!-- ================= BILL TO ================= -->

    <table>

        <tr>

            <td width="55%" style="padding-right:10px;">

                <div class="section-title">

                    Bill To

                </div>

                <div class="card">

                    <div class="bill-name">

                        {{ $invoice->client->name }}

                    </div>

                    @if ($invoice->client->company)
                        <div class="bill-company">

                            {{ $invoice->client->company }}

                        </div>
                    @endif

                    @if ($invoice->client->billing_address)
                        {{ $invoice->client->billing_address }}<br>
                    @endif

                    {{ collect([$invoice->client->city, $invoice->client->state, $invoice->client->country])->filter()->implode(', ') }}

                    @if ($invoice->client->postal_code)
                        - {{ $invoice->client->postal_code }}
                    @endif

                    <br><br>

                    @if ($invoice->client->email)
                        <strong>Email:</strong>

                        {{ $invoice->client->email }}

                        <br>
                    @endif

                    @if ($invoice->client->phone)
                        <strong>Phone:</strong>

                        {{ $invoice->client->phone }}

                        <br>
                    @endif

                    @if ($invoice->client->tax_number)
                        <strong>Tax No:</strong>

                        {{ $invoice->client->tax_number }}
                    @endif

                </div>

            </td>

            <td width="45%" style="padding-left:10px;">

                <div class="section-title">

                    Invoice Details

                </div>

                <div class="card">

                    <table>

                        <tr>

                            <td class="info-label">

                                Issue Date

                            </td>

                            <td class="info-value">

                                {{ $invoice->issue_date->format('d M Y') }}

                            </td>

                        </tr>

                        <tr>

                            <td class="info-label">

                                Due Date

                            </td>

                            <td class="info-value">

                                {{ $invoice->due_date->format('d M Y') }}

                            </td>

                        </tr>

                        @if ($invoice->project)
                            <tr>

                                <td class="info-label">

                                    Project

                                </td>

                                <td class="info-value">

                                    {{ $invoice->project->name }}

                                </td>

                            </tr>
                        @endif

                        <tr>

                            <td class="info-label">

                                Currency

                            </td>

                            <td class="info-value">

                                {{ $invoice->currency }}

                            </td>

                        </tr>

                    </table>

                </div>

            </td>

        </tr>

    </table>

    <div class="divider"></div>
    <!-- ================= ITEMS ================= -->

    <table class="items">

        <thead>

            <tr>

                <th width="45%">Description</th>
                <th width="10%" class="text-right">Qty</th>
                <th width="15%" class="text-right">Unit Price</th>
                <th width="10%" class="text-right">Tax</th>
                <th width="20%" class="text-right">Amount</th>

            </tr>

        </thead>

        <tbody>

            @forelse($invoice->items as $item)
                <tr>

                    <td>

                        <strong>{{ $item->description }}</strong>

                        @if ($item->service)
                            <br>

                            <span class="text-muted" style="font-size:10px;">
                                {{ $item->service->name }}
                            </span>
                        @endif

                    </td>

                    <td class="text-right">

                        {{ rtrim(rtrim(number_format($item->quantity, 2), '0'), '.') }}

                    </td>

                    <td class="text-right">

                        {{ $invoice->currency }}

                        {{ number_format($item->unit_price, 2) }}

                    </td>

                    <td class="text-right">

                        @if ($item->tax_rate)
                            {{ number_format($item->tax_rate, 2) }}%
                        @else
                            —
                        @endif

                    </td>

                    <td class="text-right fw-bold">

                        {{ $invoice->currency }}

                        {{ number_format($item->amount, 2) }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        No invoice items.

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

    <!-- ================= TOTALS ================= -->

    <table style="margin-top:25px;">

        <tr>

            <td width="55%"></td>

            <td width="45%">

                <table class="totals-table">

                    <tr>

                        <td class="label">

                            Subtotal

                        </td>

                        <td class="value">

                            {{ $invoice->currency }}

                            {{ number_format($invoice->subtotal, 2) }}

                        </td>

                    </tr>

                    <tr>

                        <td class="label">

                            Tax

                        </td>

                        <td class="value">

                            {{ $invoice->currency }}

                            {{ number_format($invoice->tax_amount, 2) }}

                        </td>

                    </tr>

                    @if ($invoice->discount_amount > 0)
                        <tr>

                            <td class="label">

                                Discount

                            </td>

                            <td class="value">

                                - {{ $invoice->currency }}

                                {{ number_format($invoice->discount_amount, 2) }}

                            </td>

                        </tr>
                    @endif

                    <tr class="total-row">

                        <td>

                            TOTAL

                        </td>

                        <td class="value">

                            {{ $invoice->currency }}

                            {{ number_format($invoice->total_amount, 2) }}

                        </td>

                    </tr>

                    @if ($invoice->paid_amount > 0)
                        <tr>

                            <td style="padding-top:12px;color:#16A34A;font-weight:bold;">

                                Paid

                            </td>

                            <td class="value" style="padding-top:12px;color:#16A34A;">

                                {{ $invoice->currency }}

                                {{ number_format($invoice->paid_amount, 2) }}

                            </td>

                        </tr>

                        <tr class="balance-row">

                            <td>

                                Balance Due

                            </td>

                            <td class="value">

                                {{ $invoice->currency }}

                                {{ number_format($invoice->balance_due, 2) }}

                            </td>

                        </tr>
                    @endif

                </table>

            </td>

        </tr>

    </table>

    <!-- ================= PAYMENT SUMMARY ================= -->

    @if ($invoice->paid_amount > 0)
        <table style="margin-top:30px;">

            <tr>

                <td width="48%">

                    <div style="background:#ECFDF5;border:1px solid #BBF7D0;padding:15px;border-radius:6px;">

                        <div style="font-size:11px;color:#15803D;text-transform:uppercase;">

                            Amount Paid

                        </div>

                        <div style="font-size:22px;font-weight:bold;color:#15803D;margin-top:6px;">

                            {{ $invoice->currency }}

                            {{ number_format($invoice->paid_amount, 2) }}

                        </div>

                    </div>

                </td>

                <td width="4%"></td>

                <td width="48%">

                    <div style="background:#FEF2F2;border:1px solid #FECACA;padding:15px;border-radius:6px;">

                        <div style="font-size:11px;color:#DC2626;text-transform:uppercase;">

                            Outstanding Balance

                        </div>

                        <div style="font-size:22px;font-weight:bold;color:#DC2626;margin-top:6px;">

                            {{ $invoice->currency }}

                            {{ number_format($invoice->balance_due, 2) }}

                        </div>

                    </div>

                </td>

            </tr>

        </table>
    @endif
    <!-- ================= NOTES & TERMS ================= -->

    @if ($invoice->notes || $invoice->terms)

        <table style="width:100%;margin-top:35px;border-collapse:collapse;">

            <tr>

                @if ($invoice->notes)
                    <td width="48%" valign="top">

                        <div style="border:1px solid #E5E7EB;border-radius:8px;padding:15px;">

                            <div
                                style="font-size:11px;
                            text-transform:uppercase;
                            color:#6B7280;
                            font-weight:bold;
                            margin-bottom:10px;">
                                Notes
                            </div>

                            <div style="font-size:12px;line-height:22px;color:#374151;">
                                {!! nl2br(e($invoice->notes)) !!}
                            </div>

                        </div>

                    </td>
                @endif

                @if ($invoice->notes && $invoice->terms)
                    <td width="4%"></td>
                @endif

                @if ($invoice->terms)
                    <td width="48%" valign="top">

                        <div style="border:1px solid #E5E7EB;border-radius:8px;padding:15px;">

                            <div
                                style="font-size:11px;
                            text-transform:uppercase;
                            color:#6B7280;
                            font-weight:bold;
                            margin-bottom:10px;">
                                Payment Terms
                            </div>

                            <div style="font-size:12px;line-height:22px;color:#374151;">
                                {!! nl2br(e($invoice->terms)) !!}
                            </div>

                        </div>

                    </td>
                @endif

            </tr>

        </table>

    @endif


    <!-- ================= THANK YOU ================= -->

    <div style="margin-top:45px;padding:20px;background:#F8FAFC;border-left:5px solid #2563EB;">

        <h3 style="margin:0 0 10px;color:#111827;">
            Thank You!
        </h3>

        <p style="margin:0;font-size:12px;color:#4B5563;line-height:22px;">

            Thank you for choosing <strong>FusionCentrix</strong>.

            We sincerely appreciate your business and look forward to working with you again.

        </p>

    </div>


    <!-- ================= PAYMENT DETAILS ================= -->

    <div style="margin-top:30px;">

        <table width="100%" style="border-collapse:collapse;">

            <tr>

                <td width="60%" valign="top">

                    <div
                        style="font-size:11px;
                            color:#6B7280;
                            text-transform:uppercase;
                            margin-bottom:8px;
                            font-weight:bold;">

                        Contact Information

                    </div>

                    <div style="font-size:12px;line-height:22px;">

                        <strong>FusionCentrix</strong><br>

                        Building Modern Software Solutions<br>

                        Website:
                        https://fusioncentrix.com<br>

                        Email:
                        info@fusioncentrix.com<br>

                        Phone:
                        +91 82820 98384

                    </div>

                </td>

                <td width="40%" valign="bottom" align="center">

                    <div
                        style="margin-top:45px;
                            border-top:1px solid #999;
                            width:180px;
                            padding-top:8px;
                            text-align:center;
                            font-size:12px;">

                        Authorized Signature

                    </div>

                </td>

            </tr>

        </table>

    </div>


    <!-- ================= FOOTER ================= -->

    <div style="margin-top:40px;
            border-top:2px solid #2563EB;
            padding-top:15px;">

        <table width="100%">

            <tr>

                <td style="font-size:10px;color:#6B7280;">

                    © {{ date('Y') }} FusionCentrix

                    <br>

                    This invoice was generated electronically and is valid without a signature.

                </td>

                <td align="right" style="font-size:10px;color:#6B7280;">

                    Generated:
                    {{ now()->format('d M Y h:i A') }}

                    <br>

                    Invoice:
                    {{ $invoice->invoice_number }}

                </td>

            </tr>

        </table>

    </div>


    <!-- ================= WATERMARK ================= -->

    @if ($invoice->status === 'paid')
        <div
            style="position:fixed;
            top:38%;
            left:18%;
            font-size:90px;
            color:#16A34A;
            font-weight:bold;
            opacity:.08;
            transform:rotate(-30deg);">

            PAID

        </div>
    @elseif($invoice->status === 'overdue')
        <div
            style="position:fixed;
            top:38%;
            left:10%;
            font-size:90px;
            color:#DC2626;
            font-weight:bold;
            opacity:.08;
            transform:rotate(-30deg);">

            OVERDUE

        </div>
    @else
        <div
            style="position:fixed;
            top:38%;
            left:16%;
            font-size:90px;
            color:#2563EB;
            font-weight:bold;
            opacity:.08;
            transform:rotate(-30deg);">

            Pending

        </div>
    @endif

</body>

</html>
