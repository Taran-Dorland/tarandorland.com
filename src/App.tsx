import { InnerData, ILinkItem } from './components';
import { IconBrandLinkedin, IconBrandGithub, IconMail } from '@tabler/icons-react';

const contactLinks:Array<ILinkItem> = [
	{
		title: 'LinkedIn',
		link: 'https://www.linkedin.com/in/taran-d-44332b147/',
		icon: <IconBrandLinkedin size='1.5rem' stroke={1.5} />,
	},
	{
		title: 'GitHub',
		link: 'https://github.com/Taran-Dorland',
		icon: <IconBrandGithub size='1.5rem' stroke={1.5} />,
	},
	{
		title: 'Email',
		link: 'mailto:taran@tarandorland.com',
		icon: <IconMail size='1.5rem' stroke={1.5} />,
	},
];

function App() {
	return (
		<InnerData
			name='Taran Dorland'
			jobLocation='Government of Canada'
			contactLinks={contactLinks}
			date='2023-07-09'
		/>
	);
}

export default App;
