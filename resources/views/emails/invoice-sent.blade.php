<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="margin:0;padding:0;background:#f4f7fb;font-family:Arial,Helvetica,sans-serif;color:#374151;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7fb;padding:40px 15px;">

        <tr>

            <td align="center">

                <table width="680" cellpadding="0" cellspacing="0"
                    style="background:#ffffff;border-radius:12px;border:1px solid #e5e7eb;overflow:hidden;">

                    <!-- Header -->

                    <tr>

                        <td style="background:#0F172A;padding:40px;text-align:center;">

                            <img src="https://fusioncentrix.com/logo.png" alt="FusionCentrix" width="220"
                                style="display:block;margin:auto;">

                            <div style="height:25px;"></div>

                            <h1 style="margin:0;font-size:30px;color:#ffffff;font-weight:700;">
                                Invoice
                            </h1>

                            <p style="margin:12px 0 0;color:#CBD5E1;font-size:16px;">
                                Invoice #
                                <strong>{{ $invoice->invoice_number }}</strong>
                            </p>

                        </td>

                    </tr>

                    <!-- Greeting -->

                    <tr>

                        <td style="padding:40px;">

                            <h2 style="margin-top:0;color:#111827;">
                                Hello {{ $invoice->client->name }},
                            </h2>

                            <p style="font-size:16px;line-height:28px;color:#4B5563;">

                                Thank you for choosing <strong>FusionCentrix</strong>.

                                Your invoice has been generated successfully and is attached to this email as a PDF.

                            </p>

                        </td>

                    </tr>

                    <!-- Invoice Summary -->

                    <tr>

                        <td style="padding:0 40px 35px;">

                            <table width="100%" cellpadding="12" cellspacing="0"
                                style="border:1px solid #E5E7EB;border-radius:8px;overflow:hidden;">

                                <tr style="background:#F8FAFC;">

                                    <td width="40%"><strong>Invoice Number</strong></td>

                                    <td>{{ $invoice->invoice_number }}</td>

                                </tr>

                                <tr>

                                    <td><strong>Issue Date</strong></td>

                                    <td>{{ optional($invoice->issue_date)->format('d M Y') }}</td>

                                </tr>

                                <tr style="background:#F8FAFC;">

                                    <td><strong>Due Date</strong></td>

                                    <td>{{ optional($invoice->due_date)->format('d M Y') }}</td>

                                </tr>

                                @if ($invoice->project)
                                    <tr>

                                        <td><strong>Project</strong></td>

                                        <td>{{ $invoice->project->name }}</td>

                                    </tr>
                                @endif

                                <tr>

                                    <td><strong>Total Amount</strong></td>

                                    <td style="font-size:22px;font-weight:bold;color:#0F172A;">

                                        {{ $invoice->currency }}

                                        {{ number_format($invoice->total_amount, 2) }}

                                    </td>

                                </tr>

                            </table>

                        </td>

                    </tr>

                    <!-- Notice -->

                    <tr>

                        <td style="padding:0 40px;">

                            <div
                                style="background:#EFF6FF;border-left:5px solid #2563EB;padding:20px;border-radius:6px;">

                                <strong style="color:#1D4ED8;">
                                    📎 PDF Attached
                                </strong>

                                <p style="margin:10px 0 0;color:#4B5563;line-height:24px;">

                                    The invoice PDF is attached with this email.

                                    Please keep it for your accounting records.

                                </p>

                            </div>

                        </td>

                    </tr>

                    <!-- CTA -->

                    <tr>

                        <td align="center" style="padding:40px;">

                            <a href="https://fusioncentrix.com"
                                style="background:#2563EB;
color:#ffffff;
text-decoration:none;
padding:15px 34px;
border-radius:8px;
font-weight:bold;
display:inline-block;">

                                Visit FusionCentrix

                            </a>

                        </td>

                    </tr>

                    <!-- Support -->

                    <tr>

                        <td style="padding:0 40px 35px;">

                            <h3 style="margin-bottom:12px;color:#111827;">
                                Need Assistance?
                            </h3>

                            <p style="margin:0;line-height:28px;color:#4B5563;">

                                If you have any questions regarding this invoice or require any clarification,

                                simply reply to this email or contact our team.

                            </p>

                        </td>

                    </tr>

                    <!-- Footer -->

                    <tr>

                        <td style="background:#F9FAFB;border-top:1px solid #E5E7EB;padding:35px;text-align:center;">

                            <img src="https://fusioncentrix.com/logo.png" width="170" alt="FusionCentrix">

                            <div style="height:18px;"></div>

                            <p style="margin:0;font-size:15px;color:#6B7280;">

                                Building Modern Software Solutions

                            </p>

                            <div style="height:18px;"></div>

                            <p style="margin:0;font-size:14px;color:#6B7280;">

                                🌐 https://fusioncentrix.com

                            </p>

                            <p style="margin:8px 0 0;font-size:14px;color:#6B7280;">

                                📧 info@fusioncentrix.com

                            </p>

                            <p style="margin-top:25px;font-size:12px;color:#9CA3AF;line-height:22px;">

                                This is an automated email from FusionCentrix.

                                Please do not reply unless you need assistance regarding this invoice.

                            </p>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>

    </table>

</body>

</html>
