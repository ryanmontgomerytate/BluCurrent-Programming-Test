import { Civilization } from '../types/civilizations'

export const fetchCivilizationsData = async (): Promise<Civilization[]> => {
  const apiUrl = '/api/civilizations'
  let civilizations: Civilization[] = []

  try {
    const response = await fetch(apiUrl)
    const json = (await response.json())
    civilizations = (json as any).map(civ => Object.assign(new Civilization(), civ))
  } catch (error) {
    console.log('error', error)
  }

  return civilizations
}
