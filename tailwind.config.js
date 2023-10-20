import preset from './vendor/filament/support/tailwind.config.preset'
import wireUiPreset from './vendor/wireui/wireui/tailwind.config.js'

export default {
    presets: [preset, wireUiPreset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    menu: '#111111',
                    'menu-responsive': '#1f1f1f',
                    bg: '#0a0e13',
                    content: '#0e1519',
                    border: 'rgba(51,51,51,.25)',
                    blue: '#00c8c7',
                    red: '#db3238',
                    'red-active': '#c52228',
                    gray: '#333333',
                    scroll: '#242c32',
                },
            },
            fontFamily: {
                sans: ['Colfax', 'sans-serif'],
                mark: ['MarkPro', 'Colfax', 'sans-serif'],
            },
            screens: {
                xs: '500px',
            },
        },
    },
}
