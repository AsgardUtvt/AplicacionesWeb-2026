<?php
namespace App\Modules\Menu\Views;


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Overlay - Unidos por una Causa</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; }
        html { scroll-behavior: smooth; }
        body { 
            background-color: #f7f9f8; 
            color: #2d3748; 
            line-height: 1.6;
            margin-left: 74px;
        }

        /* --- SIDEBAR OVERLAY --- */
        .qwen-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: #171717;
            color: #e5e5e5;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            overflow: hidden;
            border-right: 1px solid #2a2a2a;
            width: 64px;
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .qwen-sidebar.expanded {
            width: 300px;
            box-shadow: 10px 0 30px rgba(0,0,0,0.5);
        }

        /* Header del sidebar */
        .sidebar-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 16px;
            border-bottom: 1px solid #2a2a2a;
            min-height: 64px;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
            font-weight: 800;
            color: #fff;
            text-decoration: none;
            white-space: nowrap;
            overflow: hidden;
        }

        .sidebar-brand svg {
            min-width: 24px;
        }

        .sidebar-brand span { color: #10b981; }

        .brand-text {
            opacity: 0;
            width: 0;
            transition: opacity 0.2s;
        }

        .expanded .brand-text {
            opacity: 1;
            width: auto;
        }

        .toggle-btn {
            background: transparent;
            border: none;
            color: #a3a3a3;
            cursor: pointer;
            padding: 6px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .toggle-btn:hover {
            background: #2a2a2a;
            color: #fff;
        }

        .toggle-btn svg {
            transition: transform 0.3s;
        }

        .expanded .toggle-btn svg {
            transform: rotate(180deg);
        }

        /* Acciones principales */
        .sidebar-actions {
            padding: 12px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .action-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 8px;
            color: #d4d4d4;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            white-space: nowrap;
            overflow: hidden;
        }

        .action-item:hover {
            background: #2a2a2a;
            color: #fff;
        }

        .action-item svg {
            min-width: 20px;
            stroke: currentColor;
        }

        .action-text {
            opacity: 0;
            width: 0;
            transition: opacity 0.2s;
        }

        .expanded .action-text {
            opacity: 1;
            width: auto;
        }

        .library-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .library-item .action-text {
            flex: 1;
        }

        .library-arrow {
            opacity: 0;
            width: 0;
            transition: opacity 0.2s;
        }

        .expanded .library-arrow {
            opacity: 1;
            width: auto;
        }

        /* Lista de chats/causas */
        .sidebar-list {
            flex: 1;
            overflow-y: auto;
            padding: 8px 12px;
        }

        .sidebar-list::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-list::-webkit-scrollbar-thumb {
            background: #3a3a3a;
            border-radius: 4px;
        }

        .list-group-label {
            font-size: 12px;
            color: #737373;
            padding: 12px 12px 8px;
            font-weight: 600;
            white-space: nowrap;
            opacity: 0;
            height: 0;
            overflow: hidden;
        }

        .expanded .list-group-label {
            opacity: 1;
            height: auto;
        }

        .list-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            color: #d4d4d4;
            text-decoration: none;
            font-size: 13px;
            transition: all 0.2s;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .list-item:hover {
            background: #2a2a2a;
            color: #fff;
        }

        .list-item.active {
            background: #2a2a2a;
            color: #10b981;
        }

        .list-item svg {
            min-width: 18px;
        }

        .list-item-text {
            opacity: 0;
            width: 0;
            transition: opacity 0.2s;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .expanded .list-item-text {
            opacity: 1;
            width: auto;
        }

        /* Footer con perfil */
        .sidebar-footer {
            padding: 12px;
            border-top: 1px solid #2a2a2a;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            color: #fff;
            min-width: 32px;
        }

        .user-info {
            flex: 1;
            overflow: hidden;
            opacity: 0;
            width: 0;
            transition: opacity 0.2s;
        }

        .expanded .user-info {
            opacity: 1;
            width: auto;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-plan {
            font-size: 11px;
            color: #737373;
        }

        .upgrade-btn {
            background: transparent;
            border: 1px solid #404040;
            color: #d4d4d4;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .upgrade-btn:hover {
            background: #10b981;
            border-color: #10b981;
            color: #fff;
        }

        .expanded .upgrade-btn {
            opacity: 1;
            width: auto;
            padding: 6px 12px;
        }

        /* Overlay cuando está expandido */
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.3);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* --- CONTENIDO PRINCIPAL --- */
        .main-content {
            min-height: 100vh;
            padding-left: 64px;
        }

        section { 
            padding: 100px 24px; 
            min-height: 100vh; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            max-width: 1200px; 
            margin: 0 auto; 
        }

        #causas { background-color: #f1f5f9; width: 100%; max-width: 100vw; }
        #transparencia { background-color: #fff; }
        #contacto { background-color: #0f172a; color: #fff; width: 100%; max-width: 100vw; }
        #contacto h2 { color: #fff; }

        @media (max-width: 768px) {
            .qwen-sidebar.expanded {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <!-- Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="qwen-sidebar" id="sidebar">
        <div class="sidebar-top">
            <a href="#inicio" class="sidebar-brand">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                    <path d="M2 17l10 5 10-5"/>
                    <path d="M2 12l10 5 10-5"/>
                </svg>
                <span class="brand-text">Un<span>GranoDeMostaza</span></span>
            </a>
            <button class="toggle-btn" id="toggleBtn" aria-label="Toggle menu">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
        </div>

        <div class="sidebar-actions">
            <a href="generar_donacion" class="action-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 20h9"></path>
                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                </svg>
                <span class="action-text">Nueva Campaña</span>
            </a>
            <a href="donacion" class="action-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <span class="action-text">Buscar Causas</span>
            </a>
            <a href="#transparencia" class="action-item library-item">
                <div style="display:flex; align-items:center; gap:12px; flex:1; overflow:hidden;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                    <span class="action-text">Mi Biblioteca</span>
                </div>
                <svg class="library-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </a>
        </div>

        <div class="sidebar-footer">
            <div class="user-avatar">S</div>
            <div class="user-info">
                <div class="user-name">SUPERDROY34</div>
                <div class="user-plan">Donante Free</div>
            </div>
            <button class="upgrade-btn" id="upgradeBtn">Upgrade</button>
        </div>
    </aside>

    <!-- Contenido principal -->
    <div class="main-content">
        <section id="inicio">
            <h1>Campaña Actual: Agua Potable</h1>
            <p>Haz clic en la flecha para expandir el menú. El contenido permanece fijo.</p>
        </section>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleBtn');
        const overlay = document.getElementById('sidebarOverlay');
        const upgradeBtn = document.getElementById('upgradeBtn');
        const listItems = document.querySelectorAll('.list-item');

        function toggleSidebar() {
            const isExpanded = sidebar.classList.toggle('expanded');
            overlay.classList.toggle('active');
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        listItems.forEach(item => {
            item.addEventListener('click', (e) => {
                listItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });

        upgradeBtn.addEventListener('click', () => {
            alert('Función Upgrade: Próximamente disponible para donantes premium.');
        });
    </script>
</body>
</html>
