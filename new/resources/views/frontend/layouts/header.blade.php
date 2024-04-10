<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Curious Wheels - Exploring the Road Less Traveled</title>

    <!-- Favicon  -->
    <link rel="icon" href="assets/img/favicon.png">

    <!-- ***** All CSS Files ***** -->

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">

    <STYle>
    .navbar-brand-sticky {
        color: #7e8085;;
        padding: 10px 20px;
        display: block;
    }

    .dee small {
        font-size: 49%;
    }
    .dee{
        font-weight: 600;
    }

    .demo-inline-spacing > * {
    margin: 1rem 0.375rem 0 0 !important;
}
.bg-label-primary {
    background-color: #e7e7ff !important;
    color: #F74B54 !important;
}
.badge {
    text-transform: uppercase;
    line-height: .75;
}
.badge {
    --bs-badge-padding-x: 0.593em;
    --bs-badge-padding-y: 0.52em;
    --bs-badge-font-size: 0.8125em;
    --bs-badge-font-weight: 500;
    --bs-badge-color: #fff;
    --bs-badge-border-radius: 0.25rem;
    display: inline-block;
    padding: var(--bs-badge-padding-y) var(--bs-badge-padding-x);
    font-size: var(--bs-badge-font-size);
    font-weight: var(--bs-badge-font-weight);
    line-height: 1;
    color: var(--bs-badge-color);
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: var(--bs-badge-border-radius);
}
.bg-label-secondary {
    background-color: #ebeef0 !important;
    color: #8592a3 !important;
}
.bg-label-success {
    background-color: #e8fadf !important;
    color: #71dd37 !important;
}
.bg-label-danger {
    background-color: #ffe0db !important;
    color: #ff3e1d !important;
}
.bg-label-warning {
    background-color: #fff2d6 !important;
    color: #ffab00 !important;
}
.bg-label-warning {
    background-color: #fff2d6 !important;
    color: #ffab00 !important;
}
.bg-label-dark {
    background-color: #dcdfe1 !important;
    color: #233446 !important;
}
.badge {
    text-transform: uppercase;
    line-height: .75;

}
.rounded-pill {
    border-radius: 50rem !important;
}

.demo-inline-spacing > * {
    margin: .1rem 0.375rem 0 0 !important;
}
:root, [data-bs-theme=light] {
    --bs-blue: #007bff;
    --bs-indigo: #6610f2;
    --bs-purple: #F74B54;
    --bs-pink: #e83e8c;
    --bs-red: #ff3e1d;
    --bs-orange: #fd7e14;
    --bs-yellow: #ffab00;
    --bs-green: #71dd37;
    --bs-teal: #20c997;
    --bs-cyan: #03c3ec;
    --bs-black: #435971;
    --bs-white: #fff;
    --bs-gray: rgba(67, 89, 113, 0.6);
    --bs-gray-dark: rgba(67, 89, 113, 0.8);
    --bs-gray-25: rgba(67, 89, 113, 0.025);
    --bs-gray-50: rgba(67, 89, 113, 0.05);
    --bs-primary: #F74B54;
    --bs-secondary: #8592a3;
    --bs-success: #71dd37;
    --bs-info: #03c3ec;
    --bs-warning: #ffab00;
    --bs-danger: #ff3e1d;
    --bs-light: #fcfdfd;
    --bs-dark: #233446;
    --bs-gray: rgba(67, 89, 113, 0.1);
    --bs-primary-rgb: 105, 108, 255;
    --bs-secondary-rgb: 133, 146, 163;
    --bs-success-rgb: 113, 221, 55;
    --bs-info-rgb: 3, 195, 236;
    --bs-warning-rgb: 255, 171, 0;
    --bs-danger-rgb: 255, 62, 29;
    --bs-light-rgb: 252, 253, 253;
    --bs-dark-rgb: 35, 52, 70;
    --bs-gray-rgb: 67, 89, 113;
    --bs-primary-text-emphasis: #2a2b66;
    --bs-secondary-text-emphasis: #353a41;
    --bs-success-text-emphasis: #2d5816;
    --bs-info-text-emphasis: #014e5e;
    --bs-warning-text-emphasis: #664400;
    --bs-danger-text-emphasis: #66190c;
    --bs-light-text-emphasis: rgba(67, 89, 113, 0.7);
    --bs-dark-text-emphasis: rgba(67, 89, 113, 0.7);
    --bs-primary-bg-subtle: #e1e2ff;
    --bs-secondary-bg-subtle: #e7e9ed;
    --bs-success-bg-subtle: #e3f8d7;
    --bs-info-bg-subtle: #cdf3fb;
    --bs-warning-bg-subtle: #ffeecc;
    --bs-danger-bg-subtle: #ffd8d2;
    --bs-light-bg-subtle: rgba(246, 247, 248, 0.55);
    --bs-dark-bg-subtle: rgba(67, 89, 113, 0.4);
    --bs-primary-border-subtle: #c3c4ff;
    --bs-secondary-border-subtle: #ced3da;
    --bs-success-border-subtle: #c6f1af;
    --bs-info-border-subtle: #9ae7f7;
    --bs-warning-border-subtle: #ffdd99;
    --bs-danger-border-subtle: #ffb2a5;
    --bs-light-border-subtle: rgba(67, 89, 113, 0.2);
    --bs-dark-border-subtle: rgba(67, 89, 113, 0.5);
    --bs-white-rgb: 255, 255, 255;
    --bs-black-rgb: 67, 89, 113;
    --bs-font-sans-serif: "Public Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
    --bs-font-monospace: "SFMono-Regular", Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
    --bs-root-font-size: 16px;
    --bs-body-font-family: var(--bs-font-sans-serif);
    --bs-body-font-size: 0.9375rem;
    --bs-body-font-weight: 400;
    --bs-body-line-height: 1.53;
    --bs-body-color: #697a8d;
    --bs-body-color-rgb: 105, 122, 141;
    --bs-body-bg: #f5f5f9;
    --bs-body-bg-rgb: 245, 245, 249;
    --bs-emphasis-color: #435971;
    --bs-emphasis-color-rgb: 67, 89, 113;
    --bs-secondary-color: rgba(105, 122, 141, 0.75);
    --bs-secondary-color-rgb: 105, 122, 141;
    --bs-secondary-bg: rgba(67, 89, 113, 0.2);
    --bs-secondary-bg-rgb: 67, 89, 113;
    --bs-tertiary-color: rgba(105, 122, 141, 0.5);
    --bs-tertiary-color-rgb: 105, 122, 141;
    --bs-tertiary-bg: rgba(67, 89, 113, 0.1);
    --bs-tertiary-bg-rgb: 67, 89, 113;
    --bs-heading-color: #566a7f;
    --bs-link-color: #F74B54;
    --bs-link-color-rgb: 105, 108, 255;
    --bs-link-decoration: none;
    --bs-link-hover-color: #5f61e6;
    --bs-link-hover-color-rgb: 95, 97, 230;
    --bs-code-color: #e83e8c;
    --bs-highlight-color: #697a8d;
    --bs-highlight-bg: #ffeecc;
    --bs-border-width: 1px;
    --bs-border-style: solid;
    --bs-border-color: #d9dee3;
    --bs-border-color-translucent: rgba(67, 89, 113, 0.175);
    --bs-border-radius: 0.375rem;
    --bs-border-radius-sm: 0.25rem;
    --bs-border-radius-lg: 0.5rem;
    --bs-border-radius-xl: 0.625rem;
    --bs-border-radius-xxl: 2rem;
    --bs-border-radius-2xl: var(--bs-border-radius-xxl);
    --bs-border-radius-pill: 50rem;
    --bs-box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45);
    --bs-box-shadow-sm: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4);
    --bs-box-shadow-lg: 0 0.625rem 1.25rem rgba(161, 172, 184, 0.5);
    --bs-box-shadow-inset: inset 0 1px 2px rgba(67, 89, 113, 0.075);
    --bs-focus-ring-width: 0.15rem;
    --bs-focus-ring-opacity: 0.75;
    --bs-focus-ring-color: rgba(67, 89, 113, 0.75);
    --bs-form-valid-color: #71dd37;
    --bs-form-valid-border-color: #71dd37;
    --bs-form-invalid-color: #ff3e1d;
    --bs-form-invalid-border-color: #ff3e1d;
}
.blog-area {
    background: #f7ebeb;
}
    </STYle>

</head>

<body class="homepage-5">
