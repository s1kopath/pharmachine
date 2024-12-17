<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisan Terminal</title>
    <style>
        body {
            font-family: monospace;
            background-color: #1e1e1e;
            color: #c5c8c6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .terminal-container {
            width: 80%;
            max-width: 900px;
            background: #2d2d2d;
            border: 2px solid #444;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.6);
        }

        .terminal-header {
            background: #444;
            padding: 10px;
            color: #c5c8c6;
            text-align: center;
            font-weight: bold;
            border-bottom: 2px solid #333;
        }

        #terminal {
            flex: 1;
            padding: 10px;
            background: #1e1e1e;
            overflow-y: auto;
            white-space: pre-wrap;
            border-bottom: 2px solid #333;
            min-height: 400px;
            max-height: 400px;
        }

        #input-container {
            display: flex;
            padding: 10px;
            background: #2d2d2d;
        }

        #command-input {
            flex: 1;
            background: #1e1e1e;
            color: #c5c8c6;
            border: none;
            outline: none;
            font-size: 16px;
            padding: 10px;
            border-radius: 4px;
            margin-right: 10px;
        }

        #command-input::placeholder {
            color: #888;
        }

        #send-button {
            background: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        #send-button:hover {
            background: #45a049;
        }

        #commands {
            padding: 10px;
            background: #1e1e1e;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            border-top: 2px solid #333;
        }

        .command {
            background: #333;
            color: white;
            padding: 8px 12px;
            border: 1px solid #444;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .command:hover {
            background: #4caf50;
            border-color: #4caf50;
        }
    </style>
</head>

<body>
    <div class="terminal-container">
        <div class="terminal-header">Artisan Command Terminal</div>
        <div id="terminal">(Ready for commands...)<br></div>
        <div id="input-container">
            <input type="text" id="command-input" placeholder="Type an Artisan command..." autocomplete="off">
            <button id="send-button">Run</button>
        </div>
        <div id="commands">
            <!-- Safe commands displayed as clickable buttons -->
            <span class="command" data-command="optimize:clear">optimize:clear</span>
            <span class="command" data-command="config:cache">config:cache</span>
            <span class="command" data-command="config:clear">config:clear</span>
            <span class="command" data-command="route:cache">route:cache</span>
            <span class="command" data-command="route:clear">route:clear</span>
            <span class="command" data-command="view:cache">view:cache</span>
            <span class="command" data-command="view:clear">view:clear</span>
            <span class="command" data-command="cache:clear">cache:clear</span>
            <span class="command" data-command="queue:restart">queue:restart</span>
            <span class="command" data-command="event:cache">event:cache</span>
            <span class="command" data-command="event:clear">event:clear</span>
            <span class="command" data-command="storage:link">storage:link</span>
            <span class="command" data-command="migrate">migrate</span>
            <span class="command" data-command="schedule:run">schedule:run</span>
            <span class="command" data-command="clear">clear</span>
        </div>
    </div>
    <script>
        const terminal = document.getElementById('terminal');
        const commandInput = document.getElementById('command-input');
        const sendButton = document.getElementById('send-button');
        const commands = document.querySelectorAll('.command');

        const appendToTerminal = (message, type = 'output') => {
            const color = type === 'error' ? 'red' : 'white';
            terminal.innerHTML += `<span style="color: ${color};">${message}</span>\n`;
            terminal.scrollTop = terminal.scrollHeight; // Auto-scroll
        };

        const executeCommand = async () => {
            const command = commandInput.value.trim();
            if (!command) return;

            if (command.toLowerCase() === 'clear') {
                terminal.innerHTML = '(Ready for commands...)'; // Reset terminal content
                terminal.scrollTop = terminal.scrollHeight; // Auto-scroll
                commandInput.value = ''; // Clear the input field
                return;
            }

            appendToTerminal(`$ ${command}`, 'input');
            commandInput.value = '';

            try {
                const response = await fetch('/artisan-terminal/execute', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        command
                    }),
                });
                const result = await response.json();
                appendToTerminal(result.output, result.status === 'success' ? 'output' : 'error');
            } catch (error) {
                appendToTerminal('An error occurred while executing the command.', 'error');
            }
        };

        sendButton.addEventListener('click', executeCommand);
        commandInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') executeCommand();
        });

        // Handle click events on the command buttons
        commands.forEach((commandButton) => {
            commandButton.addEventListener('click', () => {
                commandInput.value = commandButton.dataset.command;
            });
        });
    </script>
</body>

</html>
